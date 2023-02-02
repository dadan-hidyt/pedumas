<?php

namespace App\View\Components\Masyarakat;

use Illuminate\View\Component;

class PengaduanForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $data;
    public function __construct($type,$data = [])
    {
        $this->type = $type;
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.masyarakat.pengaduan-form');
    }
}
