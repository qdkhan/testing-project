<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function paginateProduct(){
        $datas = Product::paginate(10);
        return view('productListing', compact('datas'));
    }

    public function generatePDF(){
        $datas = Product::get();
        $pdf = PDF::loadView('my-pdf', ['datas' => $datas]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('onlinewebtutorblog.pdf');
    }

    public function generateStr(Request $request){
        $name = Str::slug($request->slug);
        return $name;
    }
}
