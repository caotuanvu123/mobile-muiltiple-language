<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Language;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id = 0)
    {
        if(session()->get('locale') == Language::EN) {
            $products = Product::select('id', 'quantity', 'image', 'name_en AS name', 'desc_en AS desc', 'price AS price');
            $categories = Category::select('id', 'name_en AS name');
        } else {
            $products = Product::select('id', 'quantity', 'image', 'name_vi AS name', 'desc_vi AS desc', 'price AS price');
            $categories = Category::select('id', 'name_vi AS name');
        }
        if ($id != 0) {
            $products->where('category_id', '=', trim($id));
        }
        $categories = $categories->get();
        $products = $products->paginate(DEFAULT_PAGINATION_PER_PAGE);
        return view('frontend.product', ['products' => $products, 'categories' =>$categories]);
    }
    public function detail($id){
        if(session()->get('locale') == Language::EN) {
            $product = Product::select('id', 'quantity', 'image', 'name_en AS name', 'desc_en AS desc', 'price AS price');
        } else {
            $product = Product::select('id', 'quantity', 'image', 'name_vi AS name', 'desc_vi AS desc', 'price AS price');
        }
        $product = $product->where('id', $id)->firstOrFail();

        return view('frontend.single', ['product' =>$product]);
    }
}
