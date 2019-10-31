<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $products = Products::where('product_name', 'LIKE', "%$request->keywords%")
            ->orWhere('type', 'LIKE', "%$request->keywords%")->get();

        return response()->json($products);
    }
}
