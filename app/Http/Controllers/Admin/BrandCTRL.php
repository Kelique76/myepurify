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
        //$katas = Category::where('status','1')->get();

        // $katas = Category::orderBy('id','ASC')->paginate(4);

        //    return view('admin.category.index', compact('katas'));
        return view('admin.brands.index');
    }

    public function nambah()
    {
        return view('admin.brands.tambah');
    }

    public function tambahkan(Request $req)
    {
        $req->validate([
            'name' => 'required',


        ]);
        $brds = new Brand();

        $brds->name = $req->name;
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
        return view('admin.brands.edit',compact('cats'));
    }

    public function updatekan(Request $req, $id)
    {
        $req->validate([
            'name' => 'required',


        ]);
        $brds = Brand::find($id);

        $brds->name = $req->name;
        $brds->slug = Str::slug($req->name);

        $brds->status = $req->status == true ? "1": "0";

        if ($brds->update()) {
            return redirect('admin/merks')->with('message', 'Berhasil Ubah Merk');
        } else {
            return redirect()->back()->with('message', 'Gagal Ubah Merk');
        }
    }

   
}
