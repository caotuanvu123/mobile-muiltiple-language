<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <section>
        <div class="modal-body">
            <div class="col-md-5 modal_body_left">
                <img src="{{route('product.image', $product->id)}}" alt="{{$product->name}}" class="img-responsive" />
            </div>
            <div class="col-md-7 modal_body_right">
                <h4>{{$product->name}}</h4>
                <p>{!! $product->desc!!}</p>
                <div class="modal_body_right_cart simpleCart_shelfItem">
                    <p><i class="item_price">{{number_format($product->price, 0, ',', '.')}} {{trans('messages.money')}}</i></p>
                    <div>
                        <a href="{{route('cart.product', $product->id)}}" class="w3ls-cart">{{trans('messages.add_to_cart')}}</a>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </section>
</div>