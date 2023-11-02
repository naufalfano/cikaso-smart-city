<?php

namespace App\Http\Livewire\Admins;

use App\Http\Livewire\BaseController;
use App\Http\Services\AdminsService;
use Livewire\Component;

class SubmissionList extends Component
{
    use BaseController;

    private AdminsService $adminsService;

    public $submissions;

    public function boot(AdminsService $adminsService)
    {
        $this->adminsService = $adminsService;
    }

    public function mount()
    {
        $this->getForms();
    }

    public function render()
    {
        return view('livewire.admins.submission-list')->layout('layouts.layout-users');
    }

    public function getForms()
    {
        $this->submissions = $this->adminsService->getSubmissions();
    }
}
