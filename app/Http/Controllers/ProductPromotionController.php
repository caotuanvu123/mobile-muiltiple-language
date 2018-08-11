<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Language;

class ProductPromotionController extends Controller
{
    public function index()
    {
        if(session()->get('locale') == Language::EN) {
            $product = Product::select('id', 'quantity', 'image', 'name_en AS name', 'desc_en AS desc', 'price AS price');

        } else {
            $product = Product::select('id', 'quantity', 'image', 'name_vi AS name', 'desc_vi AS desc', 'price AS price');
        }
        $product->where('promotion', Product::PROMONTION);
        $listProduct = $product->orderBy('price', 'DESC')
            ->paginate(DEFAULT_PAGINATION_PER_PAGE);

        return view('frontend.promotion', ['products' => $listProduct]);
    }
}
