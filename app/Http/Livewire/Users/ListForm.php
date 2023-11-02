<?php

namespace App\Http\Livewire\Users;

use App\Http\Livewire\BaseController;
use App\Http\Services\FormService;
use Livewire\Component;

class ListForm extends Component
{
    use BaseController;

    private FormService $formService;

    public $forms = [];

    public function boot(FormService $formService)
    {
        $this->formService = $formService;
    }

    public function mount()
    {
        $this->getForms();
    }

    public function render()
    {
        return view('livewire.users.list-form')->layout("layouts.layout-users");
    }

    public function getForms()
    {
        $this->forms = $this->formService->getForms();
    }
}
