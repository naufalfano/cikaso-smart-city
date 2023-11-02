<?php

namespace App\Http\Livewire\Admins;

use App\Http\Livewire\BaseController;
use App\Http\Services\AdminsService;
use Livewire\Component;

class Login extends Component
{
    use BaseController;
    public $username, $password;

    private AdminsService $adminsService;

    public function boot(AdminsService $adminsService)
    {
        $this->adminsService = $adminsService;
    }

    public function render()
    {
        return view('livewire.admins.login')->layout('layouts.only-layout');
    }

    public function login()
    {
        try {
            $this->adminsService->login($this->username, $this->password);

            $this->redirectWithToast('/admin/home', 'success', 'Login berhasil', 'Selamat datang di aplikasi ini.');
        } catch (\Exception $e) {
            $this->dispatchToast('error', 'Gagal Login', $e->getMessage());
        }
    }
}
