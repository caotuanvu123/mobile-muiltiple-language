<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $bill = OrderDetail::select('order_detail.total', 'product.name_vi', 'product.quantity')
            ->leftJoin('product', 'product.id', '=', 'order_detail.product_id')
            ->get();
        return view('admin.report.index');

    }
}
