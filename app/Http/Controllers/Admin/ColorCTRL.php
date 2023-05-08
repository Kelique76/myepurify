<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ColorCTRL extends Controller
{
    public function indexs()
    {
        $wrns = Color::all();
        return view('admin.color.index', compact('wrns'));
    }

    public function show($id)
    {
        $wrnya = Color::find($id);
        return view('admin.color.edit', compact('wrnya'));
    }

    public function updatewrn(Request $req, $id)
    {
        $req->validate([
            'name' => 'required',


        ]);
        $brds = Color::findOrFail($id);

        $brds->name = $req->name;

        $brds->code = Str::slug($req->name);


        $brds->status = $req->status == true ? "1" : "0";
        // dd($brds);

        if ($brds->update()) {
            return redirect('admin/warnas')->with('message', 'Berhasil Ubah Warna');
        } else {
            return redirect()->back()->with('message', 'Gagal Ubah Warna');
        }
    }

    public function hpswrn($id)
    {
        $mrks = Color::find($id);
        if ($mrks->delete()) {
            return redirect('admin/warnas')->with('message', 'Berhasil Hapus Warna');
        } else {
            return redirect()->back()->with('message', 'Gagal hapus Warna');
        }
    }

    public function nambah(Request $req)
    {
        $req->validate([
            'name' => 'required',


        ]);
        $werno = new Color();

        $werno->name = $req->name;
       
        $werno->code = Str::slug($req->name);

        $werno->status = $req->status == true ? "1" : "0";

        if ($werno->save()) {
            return redirect('admin/warnas')->with('message', 'Berhasil nambah Warna Baru');
        } else {
            return redirect()->back()->with('message', 'Gagal nambah Warna');
        }
    }
}
