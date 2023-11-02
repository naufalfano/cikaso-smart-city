<?php

namespace App\Http\Livewire\Users;

use App\Http\Livewire\BaseController;
use App\Http\Services\UsersService;
use Livewire\Component;

class Register extends Component
{
    use BaseController;
    public $nik, $tanggal_lahir;

    protected $rules = [
        'nik' => 'required|numeric|digits:16',
        'tanggal_lahir' => 'required|date',
    ];

    protected $messages = [
        'nik.required' => 'NIK diperlukan untuk melakukan Login.',
        'nik.numeric' => 'Pastikan format NIK sudah benar.',
        'nik.digits' => 'Pastikan format NIK sudah benar.',
        'tanggal_lahir.required' => 'Tanggal Lahir diperlukan untuk melakukan Login.',
        'tanggal_lahir.date' => 'Pastikan format tanggal lahir sudah benar.',
    ];

    private UsersService $usersService;

    public function boot(UsersService $usersService)
    {
        $this->usersService = $usersService;
    }

    public function render()
    {
        return view('livewire.users.register')->layout('layouts.only-layout');
    }

    public function register()
    {
        $this->validate();

        $valid = $this->usersService->compareDOB($this->nik, $this->changeDOBFormat($this->tanggal_lahir));

        if (!$valid) {
            $this->addError('tanggal_lahir', 'Tanggal Lahir tidak sesuai.');
            return;
        }

        try {
            $registered = $this->usersService->register($this->nik, $this->changeDOBFormat($this->tanggal_lahir));

            if ($registered)
                $this->redirectWithToast('login', 'success', 'Pendaftaran berhasil', 'Silahkan login dengan NIK dan Tanggal Lahir yang sudah didaftarkan.');
        } catch (\Exception $e) {
            $this->dispatchToast('error', 'Gagal Login', $e->getMessage());
        }
    }

    private function changeDOBFormat($date)
    {
        $date = explode('-', $date);

        // From YYYY-MM-DD to DDMMYY
        return $date[2] . $date[1] . substr($date[0], 2);
    }
}
