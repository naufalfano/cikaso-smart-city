<?php

namespace App\Http\Services;

use App\Exceptions\Pengecualian;
use App\Models\FormSubmissions;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class AdminsService
{
    public function __construct()
    {
    }

    public function login(string $username, string $password): bool
    {
        $loginAttempt = Auth::guard('admins')->attempt([
            "name" => $username,
            "password" => $password,
        ]);

        if (!$loginAttempt)
            Pengecualian::lempar("Username atau password salah!", 4);

        return true;
    }

    public function logout(): bool
    {
        Auth::guard('admins')->logout();
        return true;
    }

    public function getSubmissions()
    {
        // get FormSubmissions with id in array
        $id = [1, 2, 3, 4];
        $submissions = FormSubmissions::whereIn('status_id', $id)->get();

        return $submissions;
    }

    public function getSubmission(string $id)
    {
        $submission = FormSubmissions::where('id', $id)->firstOrFail();

        return $submission;
    }

    public function acceptSubmission(string $id)
    {
        $submission = FormSubmissions::where('id', $id)->firstOrFail();
        $submission->status_id = 2;
        $submission->save();

        return $submission;
    }

    public function signSubmission(string $id)
    {
        $submission = FormSubmissions::where('id', $id)->firstOrFail();
        $submission->status_id = 4;
        $submission->save();

        return $submission;
    }

    public function rejectSubmission(string $id)
    {
        $submission = FormSubmissions::where('id', $id)->firstOrFail();
        $submission->status_id = 3;
        $submission->save();

        return $submission;
    }

    public function getDocx(string $id)
    {
        $submission = FormSubmissions::where('id', $id)->firstOrFail();

        $docx = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/private/template/' . $submission->forms_id . '.docx'));

        foreach ($submission->FormSubmittedField as $field) {
            $docx->setValue($this->docsifyTitle($field->FieldSubmissions->Fields->title), $field->FieldSubmissions->entry);
        }

        $docx->setValue("nik", $submission->nik);
        $docx->setValue("jenis_kelamin", $this->getJenisKelamin($submission->nik));
        $docx->setValue("tanggal_surat", \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->translatedFormat('d F Y'));

        $docx->saveAs(storage_path('app/public/submissions/' . $submission->id . '.docx'));

        // return 'app/public/submissions/' . $submission->id . '.docx';
        return '/storage/submissions/' . $submission->id . '.docx';
    }

    public function getJenisKelamin(string $nik)
    {
        $tanggal = substr($nik, 6, 2);

        if ($tanggal > 40) {
            return "Perempuan";
        } else {
            return "Laki-laki";
        }
    }

    public function docsifyTitle(string $title)
    {
        $title = str_replace(' ', '_', $title);
        $title = strtolower($title);

        return $title;
    }

    public function getStats(): array
    {
        $diterima = FormSubmissions::where('status_id', 1)->count();
        $ditolak = FormSubmissions::where('status_id', 3)->count();
        $tandatangan = FormSubmissions::where('status_id', 2)->count();
        $siapcetak = FormSubmissions::where('status_id', 4)->count();

        return [
            'diterima' => $diterima,
            'ditolak' => $ditolak,
            'tandatangan' => $tandatangan,
            'siapcetak' => $siapcetak,
        ];
    }
}
