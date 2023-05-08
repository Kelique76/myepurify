<?php

namespace App\Http\Livewire\Frondend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $prdnya, $cats, $brandInputs = [];

    protected $queryString = ['brandInputs'];
    public function mount($cats)
    {

        $this->cats = $cats;
    }
    public function render()
    {
        $this->prdnya = Product::where('category_id', $this->cats->id)
            ->when($this->brandInputs, function ($c) {
                $c->whereIn('brands', $this->brandInputs);
            })
            ->where('status', '0')
            ->get();
        return view('livewire.frondend.product.index', [
            'prdnya' => $this->prdnya,
            'cats' => $this->cats
        ]);
    }
}
