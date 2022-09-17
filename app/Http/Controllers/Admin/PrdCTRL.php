<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PrdCTRL extends Controller
{
    public function tambahprd(Request $req)
    {//url('/admin/addprd')
        $cats = Category::all();
        $mrks = Brand::all();
        return view('admin.brands.addprd', compact('cats','mrks'));
    }

    public function lihatprd(Request $req)
    { $prds = Product::all();
        return view('admin.brands.indprd', compact('prds'));
    }

    public function uploadata(Request $req)
    {

        $req->validate([
        'category_id'=>'required',
        'name'=>['required', 'string'],
        'brand'=>['required', 'string'],
        'ori_price'=>['required','integer'],
        'quantity'=>['required','integer'],
        'selli_price'=>['required','integer'],
        'desc'=>['required', 'string'],
        'meta_title'=>['required', 'string'],
        'meta_key'=>['required', 'string'],
        'meta_desc'=>['required', 'string'],
        'image'=>['nullable', 'mimes:png,jpg,jpeg']
        ]);

        $catsnya = Category::findOrFail($req->category_id);
        
       $prdnya = $catsnya->produknya()->create([
            'category_id'=>$req->category_id,
            'name'=>$req->name,
            'slug'=>Str::slug($req->name),
            'brand'=>$req->brand,
            'ori_price'=>$req->ori_price,
            'quantity'=>$req->quantity,
            'selli_price'=>$req->selli_price,
            'desc'=>$req->desc,
            'trending'=>$req->trending== true? '1':'0',
            'status'=>$req->status== true? '1':'0',
            'meta_title'=>$req->meta_title,
            'meta_key'=>$req->meta_key,
            'meta_desc'=>$req->meta_desc,

        ]);

        if($prdnya->id != null){
            return redirect('admin/liatprd')->with('message','Berhasil nambah Produk: '.$req->name);
        }else{
         return redirect()->back()->with('message','Gagal nambah produk');
        }

       // return $prdnya->id;
    }
}
