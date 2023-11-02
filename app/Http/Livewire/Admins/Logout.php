<?php

namespace App\Http\Livewire\Admins;

use App\Http\Livewire\BaseController;
use App\Http\Services\AdminsService;
use Livewire\Component;

class Logout extends Component
{
    use BaseController;

    private AdminsService $adminsService;

    public function boot(AdminsService $adminsService)
    {
        $this->adminsService = $adminsService;
    }

    public function render()
    {
        $this->adminsService->logout();

        $this->redirectWithToast('/admin/login', 'success', 'Logout berhasil', 'Terima kasih telah menggunakan aplikasi ini.');

        return view('livewire.admins.logout');
    }
}
