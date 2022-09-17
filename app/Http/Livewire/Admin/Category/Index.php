<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $katas = Category::orderBy('id', 'ASC')->paginate(20);
        return view('livewire.admin.category.index', compact('katas'));
    }

    public $kata_id;
    public function deleteCats($kata_id)
    {
        // $caty = Category::find($this->kata_id);
    //    dd($kata_id);
        $this->kata_id = $kata_id;
    }
    public function destroyCategory()
    {
        $caty = Category::find($this->kata_id);
    //     echo "<pre>";
    //     print_r($caty);
    //  echo "</pre>";
        $jejaknya = 'upload/category/'.$caty->image;
        if(File::exists($jejaknya)){
            File::delete($jejaknya);
        }
        $caty->delete();
        session()->flash('message', 'Berhasil hapus kategory');
        $this->dispatchBrowserEvent('close-modal');
    }
}
