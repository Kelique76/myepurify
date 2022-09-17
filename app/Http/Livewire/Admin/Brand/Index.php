<?php

namespace App\Http\Livewire\Admin\Brand;

use Illuminate\Support\Str;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $name, $slug, $status;
    public function rules()
    {
        return [
            'name' => 'required|string', 'slug' => 'required|string', 'status' => 'nullable'
        ];
    }

   

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $brands = Brand::orderBy('id', 'ASC')->paginate(6);
        return view('livewire.admin.brand.index', compact('brands'))->extends('layouts.admin')->section('content');
    }

    public function storeBrand()
    {
        $validasidata = $this->validate();
        dd( $this->name);
        dd( $this->slug);
        dd( $this->status);
        Brand::create([
            'name' => $this->name, 'slug' => Str::slug($this->slug), 'status' => $this->status == true ? '1' : '0'
        ]);

        session()->flash('message','Berhasil input Merk');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetIsi();
    }

    public function editBrand(int $brand_id )
    {
      // dd($brand_id);
       $merk = Brand::find($brand_id);

        $this->name = $merk->name;
       // dd($this->name);
        $this->slug = $merk->slug;
       // dd($this->slug);
        $this->status =  $merk->status;
       // dd($this->status);

    }
    public function tutupModal()
    {
       $this->resetIsi();
    }

    public function bukaModal()
    {
       $this->resetIsi();
    }
    public function resetIsi()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
    }
}
