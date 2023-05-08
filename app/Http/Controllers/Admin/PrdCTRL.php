<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Images;
use App\Models\Product;
use App\Models\Productkolor;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PrdCTRL extends Controller
{

    public function hpsgbr($id)
    {
        $gbrnya = Images::findOrFail($id);
        if (File::exists($gbrnya->image)) {
            if (File::delete($gbrnya->image)) {
                $gbrnya->delete();
                return redirect()->back()->with('message', 'Berhasil Hapus Gambar');
            }
        } else {
            return redirect()->back()->with('gagal', 'Gagal hapus Gambar');
        }
    }

    public function slide()
    {
        $slides = Slider::all();
        return view('admin.brands.slider', compact('slides'));
    }

    public function updatewarna(Request $req, $id,$idw)
    {
       $prdKlrData = Product::findOrFail($req->product_id)->produkColor()->where('id', $idw)->first();
       $prdKlrData->update([
        'quantity'=>$req->quantity,

       ]);
       return response()->json(['message', 'Berhasil Ubah Jumlah Warna Produk']);
    }

    public function hpswarna($id)
    {
        $prdKlrData = Productkolor::findOrFail($id);
        if($prdKlrData->delete()){
            // return response()->json(['message', 'Berhasil Hapus Jumlah Warna Produk']);
            return redirect()->back()->with('message', 'Berhasil Hapus Jumlah Warna Produk');
        }

    }

    public function hapus($id)
    {
        $pdknya = Product::findOrFail($id);
        if ($pdknya->produkGbr()) {
            foreach ($pdknya->produkGbr() as $gbran) {
                if (File::exists($gbran->image)) {
                    File::delete($gbran->image);
                }
            }
            $pdknya->delete();
            return redirect()->back()->with('message', 'Berhasil Hapus Produk');
        } else {
            return redirect()->back()->with('gagal', 'Gagal hapus Produk');
        }
    }
    public function tambahprd(Request $req)
    { //url('/admin/addprd')
        $cats = Category::all();
        $mrks = Brand::all();
        $wrns = Color::all();
        return view('admin.brands.addprd', compact('cats', 'mrks','wrns'));
    }

    public function lihatprd(Request $req)
    {
        $prds = Product::all();
        return view('admin.brands.indprd', compact('prds'));
    }

    public function show($id)
    {
        $cats = Category::all();
        $prds = Product::find($id);
        $mrks = Brand::all();
        $wrni = $prds->produkColor()->pluck('color_id')->toArray();
        $wrns = Color::whereNotIn('id', $wrni)->get();
        return view('admin.brands.editprd', compact('cats', 'prds', 'mrks','wrns'));
    }

    

    public function uploadata(Request $req)
    {

        $req->validate([
            'category_id' => 'required',
            'name' => ['required', 'string'],
            'brand' => ['required', 'string'],
            'ori_price' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
            'selli_price' => ['required', 'integer'],
            'desc' => ['required', 'string'],
            'meta_title' => ['required', 'string'],
            'meta_key' => ['required', 'string'],
            'meta_desc' => ['required', 'string'],
            'image' => ['nullable']
        ]);

        $catsnya = Category::findOrFail($req->category_id);

        $prdnya = $catsnya->produknya()->create([
            'category_id' => $req->category_id,
            'name' => $req->name,
            'slug' => Str::slug($req->name),
            'brand' => $req->brand,
            'ori_price' => $req->ori_price,
            'quantity' => $req->quantity,
            'selli_price' => $req->selli_price,
            'desc' => $req->desc,
            'trending' => $req->trending == true ? '1' : '0',
            'status' => $req->status == true ? '1' : '0',
            'meta_title' => $req->meta_title,
            'meta_key' => $req->meta_key,
            'meta_desc' => $req->meta_desc,

        ]);



        if ($req->hasFile('image')) {
            $finalImagePathName =
                "";
            $pathGbr = "upload/products/";
            foreach ($req->file('image') as $gbrprd) {
                $extensi = $gbrprd->getClientOriginalExtension();
                $namafile = time() . '.' . $extensi;
                $gbrprd->move($pathGbr, $namafile);
                $finalImagePathName = $pathGbr . $namafile;

                $prdnya->produkGbr()->create([
                    'product_id' =>  $prdnya->id,
                    'image' => $finalImagePathName
                ]);
            }
        }

        if($req->colors){
            foreach($req->colors as $key=>$clr){
                $prdnya->produkColor()->create([
                    'product_id' =>  $prdnya->id,
                    'color_id' =>  $clr,
                    'quantity' =>  $req->clquantity[$key]??0,
                ]);
            }
        }



        if ($prdnya->id != null) {
            return redirect('admin/liatprd')->with('message', 'Berhasil nambah Produk: ' . $req->name);
        } else {
            return redirect()->back()->with('message', 'Gagal nambah produk');
        }

        // return $prdnya->id;
    }

    public function updetan(Request $req, $id)
    {
        $prdygdicari = Category::findOrFail($req->category_id)->produknya()->where('id', $id)->first();
        if ($prdygdicari) {
            $prdygdicari->update([
                'category_id' => $req->category_id,
                'name' => $req->name,
                'slug' => Str::slug($req->name),
                'brand' => $req->brand,
                'ori_price' => $req->ori_price,
                'quantity' => $req->quantity,
                'selli_price' => $req->selli_price,
                'desc' => $req->desc,
                'trending' => $req->trending == true ? '1' : '0',
                'status' => $req->status == true ? '1' : '0',
                'meta_title' => $req->meta_title,
                'meta_key' => $req->meta_key,
                'meta_desc' => $req->meta_desc,

            ]);

            if ($req->hasFile('image')) {
                $finalImagePathName =
                    "";
                $pathGbr = "upload/products/";
                foreach ($req->file('image') as $gbrprd) {
                    $extensi = $gbrprd->getClientOriginalExtension();
                    $namafile = time() . '.' . $extensi;
                    $gbrprd->move($pathGbr, $namafile);
                    $finalImagePathName = $pathGbr . $namafile;

                    $prdygdicari->produkGbr()->create([
                        'product_id' =>  $prdygdicari->id,
                        'image' => $finalImagePathName
                    ]);
                }
            }

            return redirect('admin/liatprd')->with('message', 'Produk berhasil diubah');
        } else {
            return redirect('admin/liatprd')->with('message', 'Lah Produknya gak ada');
        }
    }
}
