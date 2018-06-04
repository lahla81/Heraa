@extends('layouts.heraa')

        @section('title')
        تواصل معنا
        @endsection('title')

        @section('contact-nav')
        class="active"
        @endsection('contact-nav')
        
        @section('content')
        <!-- صورة البنر -->
        <div class="row">
            <div class="col-xs-12" id="banner">
                <div class="overlay">
                    <h1 class="hidden-xs hidden-sm">تواصل معنا</h1>
                    <h3 class="visible-xs visible-sm">تواصل معنا</h3>
                </div>
                <img src="./images/banner-contact.jpg" alt="عنوان التدوينة">
            </div>
        </div>
        <!-- نهاية صورة البنر -->

        <div class="row">
            <div class="container">
                <div class="col-md-7 col-xs-12 contact-us">
                    <h3>تواصل معنا</h3>
                    <form action="">
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-lg custom-form-control" placeholder="الإسم" required>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-lg custom-form-control" placeholder="الإيميل" required>
                        </div>
                        <div class="col-sm-12">
                            <textarea name="mail" class="form-control input-lg custom-form-control" id="" cols="30" rows="8"placeholder="نص الرسالة"></textarea>
                        </div>
                        <button class="btn btn-default btn-primary">أرسل الرسالة</button>
                    </form>
                </div>
                <div class="col-xs-12 col-md-4 col-md-offset-1 contact-all">
                    <div class="contact-info">
                        <div>
                            <i class="fa fa-map-marker fa-lg"></i>العنوان : القاهرة الكبري / العاشر من رمضان
                        </div>
                        <div>
                            <i class="fa fa-phone fa-lg" aria-hidden="true"></i> 02-215444785
                        </div>
                        <div>
                            <i class="fa fa-envelope fa-lg" aria-hidden="true"></i>info@heraa.com
                        </div>
                    </div>
                    <div class="line"></div>
                    <h4 class="follow-us">تابعنا علي الشبكات الإجتماعية</h4>
                    <span class="social-contact">
                        <a href="#" class="facebook"><i class="fa fa-facebook fa-lg"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter fa-lg"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus fa-lg"></i></a>
                    </span>
                </div>
            </div>
        </div>
        @endsection('content')