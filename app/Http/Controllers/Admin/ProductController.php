<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\CategoryRequest;
use App\Language;
use App\Product;
use Webpatser\Uuid\Uuid;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index()
    {
        if(session()->get('locale') == Language::EN) {
            $product = Product::select('id', 'quantity', 'image', 'name_en AS name', 'desc_en AS desc', 'price AS price');
        } else {
            $product = Product::select('id', 'quantity', 'image', 'name_vi AS name', 'desc_vi AS desc', 'price AS price');
        }
        $listProduct = $product->orderBy('updated_at', 'DESC')
            ->paginate(DEFAULT_PAGINATION_PER_PAGE);
        return view('admin.product.index', ['products' => $listProduct]);
    }

    public function form_add()
    {
        $categories = Category::select('id', 'name_vi', 'name_en')->get();
        $brands = Brand::select('id', 'name')->get();
        return view('admin.product.add', ['categories' => $categories, 'brands'=>$brands]);
    }

    public function add(AddProductRequest $request)
    {
        $fileName = Uuid::generate().'.'.pathinfo($request->file('image-service')->getClientOriginalName(), PATHINFO_EXTENSION);
        $request->file('image-service')->storeAs('public/product', $fileName);

        $product = Product::create(
            [
                'image' => $fileName,
                'category_id' => $request->input('category'),
                'promotion' => $request->input('promotion'),
                'brand_id' => $request->input('brand'),
                'quantity' => $request->input('quantity'),
                'name_vi' => $request->input('desc_vi'),
                'desc_vi' => $request->input('content_vi'),
                'price' => $request->input('price'),
                'name_en' => $request->input('desc_la'),
                'desc_en' => $request->input('content_la'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );

//        $product->addToIndex();
//        Product::reindex();
//        $item = Item::create($request->all());
//        $item->addToIndex();


        return redirect(route('product.index'))
            ->with('alert-success', trans('messages.successfully_created', ['name' => trans('messages.product')]));
    }
    public function form_edit($id)
    {
        $categories = Category::select('id', 'name_vi', 'name_en')->get();
        $brands = Brand::select('id', 'name')->get();

        $product = Product::select('id', 'image', 'category_id', 'brand_id', 'promotion', 'quantity', 'name_vi', 'desc_vi', 'price', 'name_en', 'desc_en')
            ->where('id', trim($id))
            ->firstOrFail();

        return view('admin.product.edit', ['product' => $product, 'categories' => $categories, 'brands' => $brands]);
    }


    public function edit($id, CategoryRequest $request)
    {
        $data = [
            'category_id' => $request->input('category'),
            'brand_id' => $request->input('brand'),
            'promotion' => $request->input('promotion'),
            'quantity' => $request->input('quantity'),
            'name_vi' => $request->input('desc_vi'),
            'desc_vi' => $request->input('content_vi'),
            'price' => $request->input('price'),
            'name_en' => $request->input('desc_la'),
            'desc_en' => $request->input('content_la'),
            'updated_at' => Carbon::now()
        ];
        if ($request->hasFile('image-service')) {
            $fileName = Uuid::generate().'.'.pathinfo($request->file('image-service')->getClientOriginalName(), PATHINFO_EXTENSION);
            $request->file('image-service')->storeAs('public/product', $fileName);
            $data['image'] = $fileName;

        }
        Product::where('id', trim($id))->update($data);

        return redirect(route('product.index'))
            ->with('alert-success', trans('messages.successfully_updated', ['name' => trans('messages.product')]));
    }
    public function delete($id)
    {
        Product::findOrFail(trim($id));
        Product::where('id', trim($id))->delete();

        return redirect(route('product.index'))
            ->with('alert-success', trans('messages.successfully_deleted', ['name' => trans('messages.product')]));
    }

    public function detail($id)
    {
        if(session()->get('locale') == Language::EN) {
            $product = Product::select('id', 'quantity', 'image', 'name_en AS name', 'desc_en AS desc', 'price AS price');
        } else {
            $product = Product::select('id', 'quantity', 'image', 'name_vi AS name', 'desc_vi AS desc', 'price AS price');
        }
        $product = $product->where('id', $id)->firstOrFail();
        return view('admin.product.detail', ['product' => $product]);
    }

    public function image($id)
    {
        $photo = Product::where('id', trim($id))
            ->first();

        if (empty($photo)) {
            return abort(404);
        }
        $path = storage_path().'/app/public/product/'.$photo->image;
        echo file_get_contents($path);
        return true;

    }
}
