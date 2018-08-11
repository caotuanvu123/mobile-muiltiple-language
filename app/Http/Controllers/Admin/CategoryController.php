<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name_vi', 'name_en')
            ->orderBy('id', 'DESC')
            ->paginate(DEFAULT_PAGINATION_PER_PAGE);
        return view('admin.category.index', ['categories' =>$categories]);
    }

    public function form_add()
    {
        return view('admin.category.add');
    }

    public function add(CategoryRequest $request)
    {
        Category::insert(
            [
                'name_vi' => $request->input('desc_vi'),
                'desc_vi' => $request->input('content_vi'),
                'name_en' => $request->input('desc_la'),
                'desc_en' => $request->input('content_la'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );

        return redirect(route('category.index'))
            ->with('alert-success', trans('messages.successfully_created', ['name' => 'catregory']));
    }
    public function form_edit($id)
    {

        $category = Category::select('id', 'name_vi', 'desc_vi', 'name_en', 'desc_en')
            ->where('id', trim($id))->firstOrFail();

        return view('admin.category.edit', ['category' => $category]);
    }
    public function edit($id, CategoryRequest $request)
    {
        Category::where('id', trim($id))
            ->update(
                [
                    'name_vi' => $request->input('desc_vi'),
                    'desc_vi' => $request->input('content_vi'),
                    'name_en' => $request->input('desc_la'),
                    'desc_en' => $request->input('content_la'),
                ]
            );

        return redirect(route('category.index'))
            ->with('alert-success', trans('messages.successfully_updated', ['name' => 'category']));
    }
    public function delete($id)
    {
        Category::findOrFail(trim($id));
        Category::where('id', trim($id))->delete();

        return redirect(route('category.index'))
            ->with('alert-success', trans('messages.successfully_deleted', ['name' => 'category']));
    }
}
