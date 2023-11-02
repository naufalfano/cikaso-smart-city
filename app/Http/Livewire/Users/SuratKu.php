<?php

namespace App\Http\Livewire\Users;

use App\Http\Livewire\BaseController;
use App\Http\Services\FormService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SuratKu extends Component
{
    use BaseController;

    private FormService $formService;

    public $nik;
    public $surat;

    public function boot(FormService $formService)
    {
        $this->formService = $formService;
    }

    public function mount()
    {
        $this->nik = Auth::guard("users")->user()->nik;

        $this->getSurat();
    }

    public function render()
    {
        return view('livewire.users.surat-ku')->layout("layouts.layout-users");
    }

    public function getSurat()
    {
        $this->surat = $this->formService->getMyForms($this->nik);
    }
}
