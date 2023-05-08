<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandCTRL extends Controller
{

    public function index()
    {
        
        return view('admin.brands.index');
    }

    public function nambah()
    {
        $catz = Category::where('status','0')->get();
        return view('admin.brands.tambah', compact('catz'));
    }

    public function tambahkan(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'category_id'=> 'required'


        ]);
        $brds = new Brand();

        $brds->name = $req->name;
        $brds->category_id = $req->category_id;
        $brds->slug = Str::slug($req->name);

        $brds->status = $req->status == true ? "1": "0";

        if ($brds->save()) {
            return redirect('admin/merks')->with('message', 'Berhasil nambah Merk Baru');
        } else {
            return redirect()->back()->with('message', 'Gagal nambah Merk');
        }
    }

    public function hpsmrk( $id)
    {
        $mrks = Brand::find($id);
        if ($mrks->delete()) {
            return redirect('admin/merks')->with('message', 'Berhasil Hapus Merk');
        } else {
            return redirect()->back()->with('message', 'Gagal hapus Merk');
        }
    }

    public function show( $id)
    {
        $cats = Brand::find($id);
        $catags = Category::where('status','0')->get();
        return view('admin.brands.edit',compact('cats', 'catags'));
    }

    public function updatekan(Request $req, $id)
    {
        $req->validate([
            'name' => 'required',
            'category_id'=> 'required'

        ]);
        $brds = Brand::find($id);

        $brds->name = $req->name;
        $brds->category_id = $req->category_id;
        $brds->slug = Str::slug($req->name);

        $brds->status = $req->status == true ? "1": "0";

        if ($brds->update()) {
            return redirect('admin/merks')->with('message', 'Berhasil Ubah Merk');
        } else {
            return redirect()->back()->with('message', 'Gagal Ubah Merk');
        }
    }

   
}
