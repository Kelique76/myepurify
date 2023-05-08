<?php

namespace App\Http\Livewire\Admin\Brand;

use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $name, $slug, $status, $brand_id, $category_id;
    public function rules()
    {
        return [
            'name' => 'required|string', 'slug' => 'required|string', 'status' => 'nullable',
            'category_id'=> 'required|integer'
        ];
    }



    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $catz = Category::where('status', '0')->get();
        $brands = Brand::with('catznya')->orderBy('id', 'ASC')->paginate(6);
        return view('livewire.admin.brand.index', ['brands' => $brands, 'catz' => $catz])->extends('layouts.admin')->section('content');
    }

    public function storeBrand()
    {
        $validatedData = $this->validate();

        Brand::create([
            'name' => $this->name, 'slug' => Str::slug($this->slug), 'status' => $this->status == true ? '1' : '0', 'category_id' => $this->category_id
        ]);

        session()->flash('message', 'Berhasil input Merk');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetIsi();
    }

    public function editBrand(int $brand_id)
    {

        $this->brand_id = $brand_id;
        $merk = Brand::find($brand_id);
        $this->name = $merk->name;
        $this->slug = $merk->slug;
        $this->status =  $merk->status;
        $this->category_id = $merk->category_id;
    }

    public function updateBrand()
    {
        $validatedData = $this->validate();
     
        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug), 
            'status' => $this->status == true ? '1' : '0'
            ,'category_id'=>$this->category_id
        ]);

        session()->flash('message','Berhasil ubah Merk');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetIsi();
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
        $this->category_id = null;
    }
}
