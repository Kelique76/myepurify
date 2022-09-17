<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PurifyCTRL extends Controller
{
    public function index(Request $req)
    {
        $isian = $req->isi;
        $pencarian = Category::where('name', $isian)->first();
       


        if($pencarian != null){
            $notif = array(
                'pesan'=>"Product Authentic",
                'status'=>true
            );
            return response()->json($notif);
        }else{
            $notif = array(
                'pesan'=>"Product Unauthentic",
                'status'=>false
            );
            return response()->json($notif);
        }
    }
}
