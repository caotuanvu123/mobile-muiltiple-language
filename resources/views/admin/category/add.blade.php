@extends('admin.layouts.app')
@section('title', 'Add category')
@section('content')
    <div class="inner-block">
        <div class="product-block">
            <div class="pro-head">
                <h2>{{trans('messages.add_category')}}</h2>
            </div>
            <div class="error">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-md-12 product-grid">
                <form action="{{route('category.add')}}" method="POST" role="form" class="form-add-info">
                    {{ csrf_field() }}
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#lang-vi" data-toggle="tab"><img src="{{asset('images/vi.ico')}}" class="img-responsive" style="height: 20px;display: inline; margin-right: 4px"> Tiếng Việt</a></li>
                            <li class=""><a href="#lang-la" data-toggle="tab"><img src="{{asset('images/lao.ico')}}" class="img-responsive" style="height: 20px;display: inline; margin-right: 4px"> English</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="lang-vi">
                                <div class="form-group">
                                    <label for="">Danh mục</label>
                                    <input type="text" class="form-control <?php echo $errors->has('desc_vi') ? 'input-error' : '';?>" name="desc_vi" value="{{old('desc_vi')}}" placeholder="Nhập danh mục">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea class="trumbowyg" name="content_vi">{{old('content_vi')}}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane " id="lang-la">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="">name</label>
                                        <input type="text" class="form-control <?php echo $errors->has('desc_la') ? 'input-error' : '';?>" name="desc_la" value="{{old('desc_la')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>content</label>
                                    <textarea class="trumbowyg" name="content_la">{{old('content_la')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary submit-form">{{trans('messages.add_category')}}</button>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection