<?php

namespace App\Http\Livewire;

use App\Http\Services\UsersService;
use Livewire\Component;

class Logout extends Component
{
    use BaseController;

    private UsersService $usersService;

    public function boot(UsersService $usersService)
    {
        $this->usersService = $usersService;
    }

    public function render()
    {
        $this->usersService->logout();

        $this->redirectWithToast('login', 'success', 'Logout berhasil', 'Terima kasih telah menggunakan aplikasi ini.');

        return view('livewire.logout')->layout('layouts.only-layout');
    }
}
