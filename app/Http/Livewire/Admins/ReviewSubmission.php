<?php

namespace App\Http\Livewire\Admins;

use App\Http\Livewire\BaseController;
use App\Http\Services\AdminsService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ReviewSubmission extends Component
{
    use BaseController;

    private AdminsService $adminsService;

    public $submission;
    public $submission_id;
    public $fields = [];
    public $nik;

    public function boot(AdminsService $adminsService)
    {
        $this->adminsService = $adminsService;
    }

    public function mount()
    {
        $this->submission_id = request()->route("id");
        $this->nik = Auth::guard("admins")->user()->nik;

        $this->getForm();
    }

    public function render()
    {
        return view('livewire.admins.review-submission')->layout('layouts.layout-users');
    }

    public function getForm()
    {
        $this->submission = $this->adminsService->getSubmission($this->submission_id);
        $this->getFields();
    }

    public function getFields()
    {
        foreach ($this->submission->FormSubmittedField as $field) {
            array_push($this->fields, $field->FieldSubmissions);
        }
    }

    public function getDocx()
    {
        try {
            $docx = $this->adminsService->getDocx($this->submission_id);
            return redirect()->to($docx);
        } catch (\Exception $e) {
            $this->dispatchToast('error', 'Gagal', $e->getMessage());
        }
    }

    public function accept()
    {
        $this->adminsService->acceptSubmission($this->submission_id);

        $this->redirectWithToast('/admin/submissions', 'success', 'Berhasil', 'Berhasil menerima pengajuan surat.');
    }

    public function sign()
    {
        $this->adminsService->signSubmission($this->submission_id);

        $this->redirectWithToast('/admin/submissions', 'success', 'Berhasil', 'Berhasil mengganti status pengajuan surat.');
    }

    public function reject()
    {
        $this->adminsService->rejectSubmission($this->submission_id);

        $this->redirectWithToast('/admin/submissions', 'success', 'Berhasil', 'Berhasil menolak pengajuan surat.');
    }
}
