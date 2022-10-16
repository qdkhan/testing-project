<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function paginateProduct(){
        $datas = Product::paginate(1000);
        return view('productListing', compact('datas'));
    }
}
