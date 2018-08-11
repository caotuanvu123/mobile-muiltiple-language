<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductApiController extends Controller
{
    public function index()
    {
        $products = Product::select('product.image', 'product.quantity', 'product.price', 'product.name_vi', 'product.desc_vi', 'product.name_en', 'product.desc_en', 'categories.name_vi AS category_name_vi', 'categories.desc_vi AS category_desc_vi', 'categories.name_en AS categories_name_en', 'categories.desc_en AS categories_desc_en', 'brands.name AS brand_name')
            ->leftJoin('categories', 'categories.id', '=', 'product.category_id')
            ->leftJoin('brands', 'brands.id', '=', 'product.brand_id')
            ->get();
        return response()->json(
            [
                'data' => $products,
                'messages' => trans('messages.success'),
            ], 200
        );
    }
}
