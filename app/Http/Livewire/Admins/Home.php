<?php

namespace App\Http\Livewire\Admins;

use App\Http\Livewire\BaseController;
use App\Http\Services\AdminsService;
use Livewire\Component;

class Home extends Component
{
    use BaseController;

    private AdminsService $adminsService;

    public $submissions;
    public $total_diterima;
    public $total_ditolak;
    public $total_siap_cetak;
    public $total_sedang_tanda_tangan;

    public function boot(AdminsService $adminsService)
    {
        $this->adminsService = $adminsService;
    }

    public function mount()
    {
        $this->getForms();
        $this->getStats();
    }

    public function render()
    {
        return view('livewire.admins.home')->layout('layouts.layout-users');
    }

    public function getForms()
    {
        $this->submissions = $this->adminsService->getSubmissions();
    }

    public function getStats()
    {
        $stats = $this->adminsService->getStats();

        $this->total_diterima = $stats['diterima'];
        $this->total_ditolak = $stats['ditolak'];
        $this->total_sedang_tanda_tangan = $stats['tandatangan'];
        $this->total_siap_cetak = $stats['siapcetak'];
    }
}
