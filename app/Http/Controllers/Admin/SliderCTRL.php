<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderCTRL extends Controller
{
    public function addslide()
    {
       return view('admin.brands.addslide');
    }

    public function addupslide(Request $req)
    {
    
        $catg = new Slider();
 
        $catg->title = $req->title;
      
        $catg->description = $req->description;
        
        $catg->status = $req->status == true ? "1": "0";
        if($req->hasFile('image')){
            $filenya = $req->file('image');
            $kepjgan = $filenya->getClientOriginalExtension();
            $namafile = time().'.'.$kepjgan;
 
            $filenya->move('upload/slider/',$namafile);
            $catg->image = $namafile;
        }
        if($catg->save()){
            return redirect('admin/sliders')->with('message','Berhasil nambah Slider');
        }else{
         return redirect()->back()->with('message','Gagal nambah Slider');
        }
    }

    public function hpslide( $id)
    {
        $mrks = Slider::find($id);
        if ($mrks->delete()) {
            return redirect('admin/sliders')->with('message', 'Berhasil Hapus Slider');
        } else {
            return redirect()->back()->with('message', 'Gagal hapus Slider');
        }
    }

    public function show($id)
    {
        $sld = Slider::findOrFail($id);
        return view('admin.brands.editslide',compact('sld'));
    }

    public function update(Request $req,$id)
    {
        $catg = Slider::findOrFail($id);;
 
        $catg->title = $req->title;
      
        $catg->description = $req->description;
        
        $catg->status = $req->status == true ? "1": "0";
        if($req->hasFile('image')){
            $filenya = $req->file('image');
            $kepjgan = $filenya->getClientOriginalExtension();
            $namafile = time().'.'.$kepjgan;
 
            $filenya->move('upload/slider/',$namafile);
            $catg->image = $namafile;
        }
        if($catg->save()){
            return redirect('admin/sliders')->with('message','Berhasil nambah Slider');
        }else{
         return redirect()->back()->with('message','Gagal nambah Slider');
        }
    }
}
