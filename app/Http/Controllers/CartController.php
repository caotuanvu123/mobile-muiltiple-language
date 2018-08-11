<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartUpdateRequest;
use App\Http\Requests\OrderRequest;
use App\Language;
use App\Order;
use App\OrderDetail;
use App\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Services\PayPalService as PayPalSvc;

class CartController extends Controller
{
    private $paypalSvc;

    public function __construct(PayPalSvc $paypalSvc)
    {
        $this->paypalSvc = $paypalSvc;
    }

    public function paypal(OrderRequest $request)
    {
        $carts = Cart::content();
        if(!count($carts) > 0) {
            return redirect()->back()->with('alert-warning', trans('messages.cart_empty'));
        }

        $order = Order::create([
            'name' =>$request->input('name'),
            'address' => $request->input('address'),
            'mail' => $request->input('email'),
            'type' => Order::UNPAID,
            'phone' => $request->input('phone'),
            'price' => $request->input('price'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $data = [];
        $i = 1;
        foreach ($carts as $cart) {
            $price = round($cart->price / 22000) < 1 ? 1 : round($cart->price / 22000);
            $data[] =[
                'name' => $cart->name,
                'quantity' => $cart->qty,
                'price' => $price,
                'sku' => $i,
            ];
            $i ++;
        }

        $transactionDescription = "Tobaco";

        $paypalCheckoutUrl = $this->paypalSvc
            // ->setCurrency('eur')
            ->setReturnUrl(url('paypal/status'))
            // ->setCancelUrl(url('paypal/status'))
            ->setItem($data)
            // ->setItem($data[0])
            // ->setItem($data[1])
            ->createPayment($transactionDescription);

        if ($paypalCheckoutUrl) {
            foreach ($carts as $cart) {
                OrderDetail::create([
                    'order_id' =>$order->id,
                    'product_id' => $cart->id,
                    'total' => $cart->qty,
                    'name' => $cart->name,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }

            return redirect($paypalCheckoutUrl);
        } else {
            return redirect()->back()->with('alert-danger', trans('messages.error_paypal'));
        }
    }

    public function cart($id)
    {
        if(session()->get('locale') == Language::EN) {
            $product = Product::select('id', 'price', 'name_en AS name')
                ->where('id', trim($id))
                ->firstOrFail();
        } else {
            $product = Product::select('id', 'quantity', 'name_vi AS name','price')
                ->where('id', trim($id))
                ->firstOrFail();
        }

        $imageProduct = route('product.image',$product->id);
        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'options' => ['image' => $imageProduct]]);
        return redirect()->back()->with('alert-success', trans('messages.add_cart'));
    }

    public function all_cart()
    {
        $carts = Cart::content();

        return view('frontend.cart', ['carts' => $carts]);
    }
    public function delete($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back()->with('alert-success', trans('messages.delete_cart'));

    }
    public function update($rowId, CartUpdateRequest $request) {
        Cart::update($rowId, $request->input('quantity')); // Will update the quantity
        return redirect()->back()->with('alert-success', trans('messages.update_cart'));
    }

    public function order(OrderRequest $request)
    {

        $carts = Cart::content();
        if(!count($carts) > 0) {
            return redirect()->back()->with('alert-warning', trans('messages.cart_empty'));
        }
        $order = Order::create([
            'name' =>$request->input('name'),
            'address' => $request->input('address'),
            'mail' => $request->input('email'),
            'type' => Order::UNPAID,
            'phone' => $request->input('phone'),
            'price' => $request->input('price'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        foreach ($carts as $cart) {
            OrderDetail::create([
                'order_id' =>$order->id,
                'product_id' => $cart->id,
                'total' => $cart->qty,
                'name' => $cart->name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        return redirect()->back()->with('alert-success', trans('messages.cart_paid'));

    }

    public function status()
    {
        $paymentStatus = $this->paypalSvc->getPaymentStatus();
//        echo '<pre>';
//          print_r($paymentStatus->toArray());
//        echo '</pre>';
//        die();
//        dd($paymentStatus);
        return view('frontend.paypal.list');
    }

    public function paymentList()
    {
        $limit = 10;
        $offset = 0;

        $paymentList = $this->paypalSvc->getPaymentList($limit, $offset);

//        dd($paymentList->toArray());
//        $a = $paymentList->toArray();
//        echo '<pre>';
//          print_r($a['id']);
//        echo '</pre>';
//        die();
        return view('frontend.paypal.list');
    }

    public function paymentDetail($paymentId)
    {
        $paymentDetails = $this->paypalSvc->getPaymentDetails($paymentId);
//        echo '<pre>';
//          print_r($paymentDetails->toArray());
//        echo '</pre>';
//        die();
//
//        dd($paymentDetails);

        return view('frontend.paypal.detail', ['paypal' => $paymentDetails->toArray()]);


    }
}
