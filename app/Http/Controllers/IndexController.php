<?php

namespace App\Http\Controllers;

use App\Product;
use App\Language;
use App\Brand;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        if(session()->get('locale') == Language::EN) {

            $newProduct = Product::select('id', 'quantity', 'image', 'name_en AS name', 'desc_en AS desc', 'price AS price')
                ->limit(3)
                ->orderBy('id', 'DESC')
                ->get();
            $product = Product::select('id', 'quantity', 'image', 'name_vi AS name', 'desc_vi AS desc', 'price');
            if ($request->has('search') && !empty($request->input('search')))  {
                $product->where('name_vi', 'like', "%{$request->input('search')}%");
            }
            $listProduct = $product->orderBy('price', 'DESC')->paginate(DEFAULT_PAGINATION_PER_PAGE);
        } else {
            $newProduct = Product::select('id', 'quantity', 'image', 'name_vi AS name', 'desc_vi AS desc', 'price AS price')
                ->limit(3)
                ->orderBy('id', 'DESC')
                ->get();

            $product = Product::select('id', 'quantity', 'image', 'price' , 'name_en AS name', 'desc_en AS desc');
            if ($request->has('search') && !empty($request->input('search')))  {
                $product->where('name_en', 'like', "%{$request->input('search')}%");
            }
            $listProduct = $product->orderBy('price', 'DESC')->paginate(DEFAULT_PAGINATION_PER_PAGE);
        }
//        if ($request->has('search')) {
//            $listProduct = Product::search($request->input('search'))->paginate(DEFAULT_PAGINATION_PER_PAGE);

//        } else {
//            $product = Product::select('id', 'quantity', 'image', 'name_vi', 'desc_vi', 'price' , 'name_en', 'desc_en');
//            $listProduct = $product->orderBy('price', 'DESC')
//                ->paginate(DEFAULT_PAGINATION_PER_PAGE);
//        }


        $brands = Brand::select('id', 'name', 'image', 'updated_at')
            ->orderBy('id', 'DESC')->get();

        return view('frontend.index', ['products' => $listProduct, 'brands' =>$brands, 'newProduct' => $newProduct]);
    }

    public function detail($id)
    {
        if(session()->get('locale') == Language::EN) {
            $product = Product::select('id', 'quantity', 'image', 'name_en AS name', 'desc_en AS desc', 'price AS price');
        } else {
            $product = Product::select('id', 'quantity', 'image', 'name_vi AS name', 'desc_vi AS desc', 'price AS price');
        }
        $product = $product->where('id', $id)->firstOrFail();
        return view('frontend.product_detail',['product' =>$product]);
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
}
