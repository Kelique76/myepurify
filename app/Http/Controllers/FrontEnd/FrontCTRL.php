<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontCTRL extends Controller
{
    public function index()
    {
        $slds = Slider::where('status','0')->get();
        // return view('frontend.index', compact('slds'));
        $cats = Category::where('status','0')->get();
        return view('layouts.appm', compact('slds','cats'));
    }


    public function prddetail(string $slug, string $prd_slug)
    {
        $cats = Category::where('slug', $slug)->first();
        if($cats){
            $prdks = $cats->produknya()->where('slug',$prd_slug)->where('status','0')->first();
            if($prdks){
                return view('layouts.include.frontend.product.index', compact('cats','prdks'));
            }else{
                return redirect()->back();
            }
            

        }else{
            return redirect()->back();
        }
    }

    public function semuakats()
    {
        $clds = Category::where('status','0')->get();
        return view('layouts.include.frontend.category.index', compact('clds'));
    }

    public function prdkats($slug)
    {
        $cats = Category::where('slug', $slug)->first();
        if($cats){
            
            return view('layouts.include.frontend.product.viewdtl', compact('cats'));

        }else{
            return redirect()->back();
        }
    }

    public function prdetail($id)
    {
       $prd = Product::findOrFail($id);
    }
}
