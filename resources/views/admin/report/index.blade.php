@extends('admin.layouts.app')
@section('title', 'position')
@section('content')
    <div class="inner-block">
        <h2>Thống kê</h2>
        <form class="form-inline" action="{{route('report.index')}}" method="get">
            <div class="pull-right">
                <div class="form-group">
                    <p class="form-control-static">Chọn tháng</p>
                    <select class="form-control month-select" style="width: 100px;" name="month">
                        <option value="">Tất cả</option>
                        @foreach(\App\Bill::month() as $key=>$month)
                            <option value="{{$key}}">{{$month}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <p class="form-control-static">Chọn năm</p>
                    <select class="form-control year-select" style="width: 100px;" name="year">
                        @if(\App\Bill::TIME_END > \App\Bill::TIME_START)
                            <option value="">Tất cả</option>
                            @for ($i = \App\Bill::TIME_START; $i <= \App\Bill::TIME_END; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        @else
                            <option>Sai thời gian, vui lòng thiết lập lái</option>
                        @endif
                    </select>
                </div>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Số lượng đã đặt</th>
                <th>Số tour chưa thanh thanh toán</th>
                <th>Số tiền chưa thanh toán</th>
                <th>Số tour đã thanh toán</th>
                <th>Số tiền đã thanh toán</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$result['bill']['total']}}</td>
                <td>{{$result['order']['total']}}</td>
                <td>{{$result['order']['price']}}</td>
                <td>{{$result['paid']['total']}}</td>
                <td>{{$result['paid']['price']}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    @push('scripts')
        <script type="application/javascript">
            $(document).ready(function(){
                $('.year-select').change(function (e) {
                    console.log(11);
                    if ($('.year-select').val() != "" && $('.month-select').val() !="") {
                        jQuery.ajax({
                            url: "{{route('report.search')}}",
                            data: {'year':$('.year-select').val(),'month': $('.month-select').val()},
                        }).done(function (data) {
                            $('.inner-block').html(data);
                        }).fail(function () {
                            alert('không thể tải , vui lòng thử lại');
                        });
                    }

                });

                $('.month-select').change(function (e) {
                    if ($('.year-select').val() != "" && $('.month-select').val() != "")
                    {
                        jQuery.ajax({
                            url: "{{route('report.search')}}",
                            data: {'year': $('.year-select').val(), 'month': $('.month-select').val()},
                        }).done(function (data) {
                            $('.inner-block').html(data);
                        }).fail(function () {
                            alert('không thể tải , vui lòng thử lại');
                        });
                    }
                });
            })
        </script>
    @endpush
@endsection