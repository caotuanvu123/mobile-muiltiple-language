<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddBrandRequest;
use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditBrandRequest;
use Webpatser\Uuid\Uuid;
use Carbon\Carbon;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::select('id', 'name', 'image', 'updated_at')
            ->orderBy('id', 'DESC')
            ->paginate(DEFAULT_PAGINATION_PER_PAGE);
        return view('admin.brand.index', ['brands' =>$brands]);
    }

    public function form_add()
    {
        return view('admin.brand.add');
    }

    public function add(AddBrandRequest $request)
    {
        $fileName = Uuid::generate().'.'.pathinfo($request->file('image-service')->getClientOriginalName(), PATHINFO_EXTENSION);
        $request->file('image-service')->storeAs('public/brand', $fileName);
        Brand::insert(
            [
                'name' => $request->input('desc'),
                'image' => $fileName,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );

        return redirect(route('brand.index'))
            ->with('alert-success', trans('messages.successfully_created', ['name' => 'brand']));
    }
    public function form_edit($id)
    {

       $brand = Brand::select('id', 'name', 'image', 'updated_at')
            ->where('id', trim($id))->firstOrFail();

        return view('admin.brand.edit', ['brand' => $brand]);
    }
    public function edit($id, EditBrandRequest $request)
    {
        $data = [
            'name' => $request->input('desc'),
            'updated_at' => Carbon::now()
        ];
        if ($request->hasFile('image-service')) {
            $fileName = Uuid::generate().'.'.pathinfo($request->file('image-service')->getClientOriginalName(), PATHINFO_EXTENSION);
            $request->file('image-service')->storeAs('public/brand', $fileName);
            $data['image'] = $fileName;

        }
        Brand::where('id', trim($id))->update($data);

        return redirect(route('brand.index'))
            ->with('alert-success', trans('messages.successfully_updated', ['name' => 'brand']));
    }

    public function delete($id)
    {
        Brand::findOrFail(trim($id));
        Brand::where('id', trim($id))->delete();

        return redirect(route('brand.index'))
            ->with('alert-success', trans('messages.successfully_deleted', ['name' => 'brand']));
    }

    public function image($id)
    {
        $photo = Brand::where('id', trim($id))
            ->first();

        if (empty($photo)) {
            return abort(404);
        }
        $path = storage_path().'/app/public/brand/'.$photo->image;
        echo file_get_contents($path);
        return true;

    }
}
