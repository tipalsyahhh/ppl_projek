<?php

namespace App\Http\Controllers;
use App\Models\Postingan;
use App\Models\Product;

use Illuminate\Http\Request;

class PagesController extends BaseController
{
    //
    public function frominput(){
        return view('from_input');
    }

    public function Welcome(Request $request){
        $products = Product::all();
        $postingan = Postingan::all();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];

        return view('pages.welcome', compact('postingan', 'firstname', 'lastname', 'products'));
    }
}
