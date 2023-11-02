<?php

namespace App\Http\Livewire\Users;

use App\Http\Livewire\BaseController;
use App\Http\Services\UsersService;
use Livewire\Component;

class Login extends Component
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
        return view('livewire.users.login')->layout('layouts.only-layout');
    }

    public function login()
    {
        $this->validate();

        try {
            $this->usersService->login($this->nik, $this->changeDOBFormat($this->tanggal_lahir));

            $this->redirectWithToast('home', 'success', 'Login berhasil', 'Selamat datang di aplikasi ini.');
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
