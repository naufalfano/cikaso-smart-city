<?php

namespace App\Http\Livewire;

trait BaseController
{
    public function updated($field)
    {
        $this->resetValidation();
    }

    public function dispatchToast(string $type, string $title, string $text = "", string $toast_type = "toastr")
    {
        $this->dispatchBrowserEvent("{$toast_type}-toast", [
            'type' => $type,
            'title' => $title,
            'text' => $text,
        ]);
    }

    public function redirectWithToast(string $route_name, string $type, string $title, string $text = "", string $toast_type = "toastr")
    {
        return redirect()->intended($route_name)->with("{$toast_type}-toast", [
            'type' => $type,
            'title' => $title,
            'text' => $text,
        ]);
    }
}
