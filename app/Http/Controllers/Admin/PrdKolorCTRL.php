<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PrdKolorCTRL extends Controller
{
    public function updetcolor(Request $req,$id)
    {
       $pdkKlor = Product::findOrFail($req->product_id)->produkColor()->where('id',$id)->first();
       $pdkKlor->update(
        [
            'quantity'=>$req->qty
        ]
       );

       return response()->json(['message'=>'Qty produck berhasil diubah']);
    }
}
