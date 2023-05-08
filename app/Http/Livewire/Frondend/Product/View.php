<?php

namespace App\Http\Livewire\Frondend\Product;

use Livewire\Component;

class View extends Component
{
    public $catags, $prdks;
    public function mount($catags, $prdks)
    {
       $this->catags = $catags;
       $this->prdks = $prdks;
    }
    public function render()
    {
        return view('livewire.frondend.product.view',[
            'catags'=>$this->catags,
            'prdks'=>$this->prdks
        ]);
    }
}
