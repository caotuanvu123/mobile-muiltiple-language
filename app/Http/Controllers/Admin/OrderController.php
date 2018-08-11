<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EditOrderRequest;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::select('id', 'name', 'address', 'mail', 'type', 'phone', 'price', 'updated_at')
            ->paginate(DEFAULT_PAGINATION_PER_PAGE);
        return view('admin.order.index', ['orders' => $orders]);
    }
    public function form_edit($id)
    {
        $orders = OrderDetail::select('name', 'total')->where('order_id', trim($id))->get();
        return view('admin.order.edit', ['orders' =>$orders, 'id'=>trim($id)]);
    }
    public function edit($id, EditOrderRequest $request)
    {
        $data = [
            'type' => $request->input('status'),
            'updated_at' => Carbon::now()
        ];
        Order::where('id', trim($id))->update($data);

        return redirect(route('order.index'))
            ->with('alert-success', trans('messages.successfully_updated', ['name' => trans('messages.order')]));
    }
}
