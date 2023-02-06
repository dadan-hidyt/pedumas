<?php

namespace App\Http\Livewire\Petugas;

use Livewire\Component;

class DashboardCountStatistik extends Component
{
    public $count;
    public $dataAcounting;
    public function loadCount(){
        $this->dataAcounting = $this->count;
    }
    public function render()
    {
        return view('livewire.petugas.dashboard-count-statistik',['count'=>$this->count]);
    }
}
