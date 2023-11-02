<?php

namespace App\Http\Livewire\Users;

use App\Http\Livewire\BaseController;
use App\Http\Services\FormService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class NgisiForm extends Component
{
    use BaseController, WithFileUploads;

    private FormService $formService;

    public $fields = [];
    public $form;

    public $current_id;
    public $nik;

    public function boot(FormService $formService)
    {
        $this->formService = $formService;
    }

    public function mount()
    {
        $this->current_id = request()->route("id");
        $this->nik = Auth::guard('users')->user()->nik;
        $this->getFields();
        $this->getForm();
    }

    public function render()
    {
        return view('livewire.users.ngisi-form')->layout('layouts.layout-users');
    }

    public function getForm()
    {
        $this->form = $this->formService->getForm($this->current_id);
    }

    public function getFields()
    {
        $this->fields = $this->formService->getFormFields($this->current_id);
        $this->pushValue();
    }

    public function pushValue()
    {
        $this->fields = array_map(function ($field) {
            $field['value'] = $this->formService->getSavedField($field['id'], $this->nik);
            return $field;
        }, $this->fields);
    }

    public function submit()
    {
        DB::beginTransaction();
        try {
            $this->formService->submitForm($this->nik, $this->current_id, $this->fields);
        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatchToast('error', 'Gagal mengirimkan form', $e->getMessage());
            return;
        }
        DB::commit();

        $this->redirectWithToast('home', 'success', 'Form berhasil dikirimkan', 'Form berhasil dikirimkan, silahkan tunggu konfirmasi dari admin.');
    }
}
