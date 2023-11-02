<?php

namespace App\Http\Livewire\Users;

use App\Http\Livewire\BaseController;
use App\Http\Services\FormService;
use Livewire\Component;

class SuratKuDetail extends Component
{
    use BaseController;

    private FormService $formService;

    public $surat;
    public $surat_id;
    public $fields = [];

    public function boot(FormService $formService)
    {
        $this->formService = $formService;
    }

    public function mount()
    {
        $this->surat_id = request()->route("id");

        $this->getSurat();
    }

    public function render()
    {
        return view('livewire.users.surat-ku-detail')->layout('layouts.layout-users');
    }

    public function getSurat()
    {
        $this->surat = $this->formService->getMyForm($this->surat_id);
        $this->getFields();
    }

    public function getFields()
    {
        foreach ($this->surat->FormSubmittedField as $field) {
            array_push($this->fields, $field->FieldSubmissions);
        }
    }

    public function pushValue()
    {
        $this->fields = array_map(function ($field) {
            $field['value'] = $this->formService->getSavedField($field['id'], $this->nik);
            return $field;
        }, $this->fields);
    }
}
