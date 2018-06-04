@extends('layouts.heraa')

@section('title')
    عن الشركة
@endsection('title')

@section('about-nav')
    class="active"
@endsection('about-nav')

@section('content')
    <!-- صورة البنر -->
    <div class="row">
        <div class="col-xs-12" id="banner">
            <div class="overlay">
                <h1 class="hidden-xs hidden-sm">عن الشركة</h1>
                <h3 class="visible-xs visible-sm">عن الشركة</h3>
            </div>
            <img src="./images/banner-about.jpg" alt="عن الشركة">
        </div>
    </div>
    <!-- نهاية صورة البنر -->

    <!-- قسم من نحن -->
    <div class="row">
        <div class="col-xs-12 center">
            <h2>من نحن</h2>
            <p class="about-par">ناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طرييقة لوريم إيبسوم لأنها تعطي توزيعاً طبيعياً -إلى حد ما- للحرف عوضاً</p>
            <a href="#our-team" class="btn btn-default btn-primary">فريق العمل</a>
        </div>
    </div>  <!-- نهاية قسم من نحن -->
    
    <!-- فريق العمل -->
    <div class="row">
        <div class="container">
            <div id="our-team">
                <div class="col-md-4 col-xs-12 col-sm-6" id="team-work">
                    <div class="thumbnail center">
                        <img src="./images/team1.jpg" alt="team1">
                        <div class="caption">
                            <h3>مروان محمد</h3>
                            <span>مصمم ويب</span>
                            <hr>
                            <span>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ</span>
                            <p>
                                <a href="#"><i class="fa fa-linkedin fa-2x"></i></a> 
                                <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
                                <a href="#"> <i class="fa fa-facebook fa-2x"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-6" id="team-work">
                    <div class="thumbnail center">
                        <img src="./images/team2.jpg" alt="team1">
                        <div class="caption">
                            <h3>محمد هاني</h3>
                            <span>مصمم ويب</span>
                            <hr>
                            <span>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ</span>
                            <p>
                                <a href="#"><i class="fa fa-linkedin fa-2x"></i></a> 
                                <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
                                <a href="#"> <i class="fa fa-facebook fa-2x"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-6" id="team-work">
                    <div class="thumbnail center">
                        <img src="./images/team3.jpg" alt="team1">
                        <div class="caption">
                            <h3>أحمد بدر الدين</h3>
                            <span>مصمم ويب</span>
                            <hr>
                            <span>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ</span>
                            <p>
                                <a href="#"><i class="fa fa-linkedin fa-2x"></i></a> 
                                <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
                                <a href="#"> <i class="fa fa-facebook fa-2x"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-6" id="team-work">
                    <div class="thumbnail center">
                        <img src="./images/team4.jpg" alt="team1">
                        <div class="caption">
                            <h3>مصطفى أحمد</h3>
                            <span>مصمم ويب</span>
                            <hr>
                            <span>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ</span>
                            <p>
                                <a href="#"><i class="fa fa-linkedin fa-2x"></i></a> 
                                <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
                                <a href="#"> <i class="fa fa-facebook fa-2x"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-6" id="team-work">
                    <div class="thumbnail center">
                        <img src="./images/team5.jpg" alt="team1">
                        <div class="caption">
                            <h3>معاذ عبد الله</h3>
                            <span>مصمم ويب</span>
                            <hr>
                            <span>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ</span>
                            <p>
                                <a href="#"><i class="fa fa-linkedin fa-2x"></i></a> 
                                <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
                                <a href="#"> <i class="fa fa-facebook fa-2x"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-6" id="team-work">
                    <div class="thumbnail center">
                        <img src="./images/team6.jpg" alt="team1">
                        <div class="caption">
                            <h3>محمود مصطفى</h3>
                            <span>مصمم ويب</span>
                            <hr>
                            <span>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ</span>
                            <p>
                                <a href="#"><i class="fa fa-linkedin fa-2x"></i></a> 
                                <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
                                <a href="#"> <i class="fa fa-facebook fa-2x"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  نهاية فريق العمل -->
@endsection('content')

 