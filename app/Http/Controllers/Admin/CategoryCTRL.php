<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class CategoryCTRL extends Controller
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function index()
    {
        //$katas = Category::where('status','1')->get();
       
        // $katas = Category::orderBy('id','ASC')->paginate(4);

    //    return view('admin.category.index', compact('katas'));
       return view('admin.category.index' );
    }

    public function lihat()
    {
       return view('admin.category.tambah');
    }

    public function tambahkan(CategoryFormRequest $req)
    {
    $validasiData = $req->validated();
       $catg = new Category();

       $catg->name = $validasiData['name'];
       $catg->slug = Str::slug($validasiData['slug']);
       $catg->description = $validasiData['description'];
       $catg->meta_title = $validasiData['meta_title'];
       $catg->meta_keyword = $validasiData['meta_keyword'];
       $catg->meta_description = $validasiData['meta_description'];
       $catg->status = $req->status == true ? "1": "0";
       if($req->hasFile('image')){
           $filenya = $req->file('image');
           $kepjgan = $filenya->getClientOriginalExtension();
           $namafile = time().'.'.$kepjgan;

           $filenya->move('upload/category/',$namafile);
           $catg->image = $namafile;
       }
       if($catg->save()){
           return redirect('admin/category')->with('message','Berhasil nambah kategory');
       }else{
        return redirect()->back()->with('message','Gagal nambah kategory');
       }
    }

    public function update(CategoryFormRequest $req, $cats)
    {
        $validasiData = $req->validated();
        $catg = Category::findOrFail($cats);
 
        $catg->name = $validasiData['name'];
        $catg->slug = Str::slug($validasiData['slug']);
        $catg->description = $validasiData['description'];
        $catg->meta_title = $validasiData['meta_title'];
        $catg->meta_keyword = $validasiData['meta_keyword'];
        $catg->meta_description = $validasiData['meta_description'];
        $catg->status = $req->status == true ? "1": "0";
        if($req->hasFile('image')){
            $jejaknya = 'upload/category/'.$req->image;
            if(File::exists($jejaknya)){
                File::delete($jejaknya);
            }
            $filenya = $req->file('image');
            $kepjgan = $filenya->getClientOriginalExtension();
            $namafile = time().'.'.$kepjgan;
 
            $filenya->move('upload/category/',$namafile);
            $catg->image = $namafile;
        }
        if($catg->update()){
            return redirect('admin/category')->with('message','Berhasil ubah kategory');
        }else{
         return redirect()->back()->with('message','Gagal ubah kategory');
        }
    }

    public function show(Category $cats)
    {
        return view('admin.category.edit',compact('cats'));
    }
}
