@extends('frontend.layouts.app')
@section('title', 'index')
@section('content')
    <!-- banner -->
    <div class="banner banner10">
        <div class="container">
            <h2>{{trans('messages.mail_us')}}</h2>
        </div>
    </div>
    <!-- //banner -->
    <!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li>Mail Us</li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- mail -->
    <div class="mail">
        <div class="container">
            <h3>{{trans('messages.contact_form')}}</h3>
            <div class="agile_mail_grids">
                <div class="col-md-5 contact-left">
                    <h4>{{trans('messages.address')}}</h4>
                    <p>22 Nguyễn Huệ - Hồ Chí Minh City.</p>
                    <ul>
                        <li> {{trans('messages.phone')}} :+1 078 4589 2456</li>
                        <li><a href="mailto:info@example.com">info@example.com</a></li>
                    </ul>
                </div>
                <div class="col-md-7 contact-left">
                    <h4>{{trans('messages.contact_form')}}</h4>
                    <form action="#" method="post">
                        <input type="text" name="Name" placeholder="{{trans('messages.first_name_last_name_lable')}}" required="">
                        <input type="email" name="Email" placeholder="{{trans('messages.email')}}" required="">
                        <input type="text" name="Telephone" placeholder="{{trans('messages.phone')}}" required="">
                        <textarea name="message" placeholder="{{trans('messages.messages')}}" required=""></textarea>
                        <input type="submit" value="Submit" >
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>

            <div class="contact-bottom">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.486670478275!2d106.70126171499578!3d10.773988692323217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f46bf7d119d%3A0xebf6179d9abce572!2zTmd1ecOqzINuIEh1w6rMoywgQuG6v24gTmdow6ksIFF14bqtbiAxLCBI4buTIENow60gTWluaCwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1510410453744" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <!-- //mail -->
@endsection