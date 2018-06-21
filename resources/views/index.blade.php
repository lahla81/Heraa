        @extends('layouts.heraa')

        @section('title')
        الصفحة الرئيسية
        @endsection('title')

        @section('main-nav')
        class="active"
        @endsection('main-nav')
        
        @section('content')
        <!-- بداية الصور المتبدلة -->
        <div class="row">
            <div id="carousel-about" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="container-fluid">
                            <div class="overlay">
                                <div class="title1">الرائدة فى حلول التسويق والتكنولوجيا</div>
                                <div class="title2">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص</div>
                                <a href="{{route('projects.index')}}" class="btn btn-default custom-btn">تصفح المشاريع</a>
                            </div>
                            <img src="./images/Banner1.jpg" alt="عن الشركة">
                        </div>
                    </div>
                    <div class="item">
                        <div class="container-fluid">
                            <div class="overlay">
                                <div class="title1">الرائدة فى حلول التسويق والتكنولوجيا</div>
                                <div class="title2">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص</div>
                                <a href="{{route('projects.index')}}" class="btn btn-default custom-btn">تصفح المشاريع</a>
                            </div>
                            <img src="./images/Banner2.jpg" alt="عن الشركة">
                        </div>
                    </div>
                    <div class="item">
                        <div class="container-fluid">
                            <div class="overlay">
                                <div class="title1">الرائدة فى حلول التسويق والتكنولوجيا</div>
                                <div class="title2">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص</div>
                                <a href="{{route('projects.index')}}" class="btn btn-default custom-btn">تصفح المشاريع</a>
                            </div>
                            <img src="./images/Banner3.jpg" alt="عن الشركة">
                        </div>
                    </div>
                    <div class="item">
                        <div class="container-fluid">
                            <div class="overlay">
                                <div class="title1">الرائدة فى حلول التسويق والتكنولوجيا</div>
                                <div class="title2">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص</div>
                                <a href="{{route('projects.index')}}" class="btn btn-default custom-btn">تصفح المشاريع</a>
                            </div>
                            <img src="./images/Banner4.jpg" alt="عن الشركة">
                        </div>
                    </div>
                </div>
                <ol class="carousel-indicators">
                    <li data-target="#carousel-about" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-about" data-slide-to="1"></li>
                    <li data-target="#carousel-about" data-slide-to="2"></li>
                    <li data-target="#carousel-about" data-slide-to="3"></li>
                </ol>
            </div>
        </div> <!-- نهاية الصور المتبدلة -->

        <!-- قسم من نحن -->
        <div class="row">
            <div class="col-xs-12 center">
                <h2>من نحن</h2>
                <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طرييقة لوريم إيبسوم لأنها تعطي توزيعاً طبيعياً -إلى حد ما- للحرف عوضاً</p>
                <a href="{{route('team.index')}}" class="btn btn-default btn-primary">المزيد عن الشركة</a>
            </div>
        </div>  <!-- نهاية قسم من نحن -->

        <!-- قسم آخر أعمال الشركة -->
        <div class="row">
            <div class="col-xs-12" id="latest-projects">     
                <h2>آخر أعمال الشركة</h2>
                <div id="carousel-last-projects" class="carousel slide" data-ride='carousel'>
                    <div class="carousel-inner">
                        <div class="item active">
                        @foreach($projects->slice(0, 3) as $key => $project)
                            <div class="col-md-4 col-xs-12">
                                <div class="latest-project-thumbnail">
                                    <div class="project-category">
                                        {{$project->category}}
                                    </div>
                                    <div class="project-overlay">
                                        <h4>{{$project->title}}</h4>
                                        <p>{{$project->excerpt}}</p>
                                        <a href="/projects/{{$project->id}}" class="btn btn-default custom-btn">تصفح المشروع</a>
                                    </div>
                                    <img src="/storage/{{$project->image}}" alt="المشروع الأول">
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                        <div class="item">
                            @foreach($projects->slice(3, 3) as $key => $project)
                            <div class="col-md-4 col-xs-12">
                                <div class="latest-project-thumbnail">
                                    <div class="project-category">
                                    {{$project->category}}
                                    </div>
                                    <div class="project-overlay">
                                        <h4>{{$project->title}}</h4>
                                        <p>{{$project->excerpt}}</p>
                                        <a href="/projects/{{$project->id}}" class="btn btn-default custom-btn">تصفح المشروع</a>
                                    </div>
                                    <img src="/storage/{{$project->image}}" alt="المشروع الرابع">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <a href="#carousel-last-projects" class="left carousel-control" role="button" data-slide="prev">
                        <i class="fa fa-chevron-right fa-2x"></i>
                    </a>
                    <a href="#carousel-last-projects" class="right carousel-control" role="button" data-slide="next">
                        <i class="fa fa-chevron-left fa-2x"></i>
                    </a>
                </div>
                <a href="{{route('projects.index')}}" class="btn btn-default btn-primary">تصفح كل الأعمال</a>
            </div>
        </div>
        <!-- نهاية قسم آخر أعمال الشركة -->

        <!-- قالوا عن الشركة -->
        <div class="row">
            <div class="col-xs-12 center">
                <h2>قالو عن الشركة</h2>
                <img src="./images/hani.jpg" class="about-img" alt="هاني">
                <h4>محمد هاني</h4>
                <p>مصمم واجهات المستخدم</p>
                <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طرييقة لوريم إيبسوم لأنها تعطي توزيعاً طبيعياً -إلى حد ما- للحرف عوضاً</p>
            </div>
        </div> <!-- قالوا عن الشركة -->

        <!-- بداية قسم العملاء -->
        <div class="row">
            <div class="col-xs-12 center" id="client">
                <h2>العملاء</h2>
                <div class="client-logos">
                    <div class="col-xs-12 col-md-2 client">
                        <a href="http://www.horse.com/">
                            <img src="./images/client1.jpg" alt="Horse">
                        </a>
                    </div>
                    <div class="col-xs-12 col-md-2 client">
                        <a href="http://www.hsoub.com/">
                            <img src="./images/client2.jpg" alt="حسوب">
                        </a>
                    </div>
                    <div class="col-xs-12 col-md-2 client">
                        <a href="http://www.cocacola.com/">
                            <img src="./images/client3.jpg" alt="كوكاكولا">
                        </a>
                    </div>
                    <div class="col-xs-12 col-md-2 client">
                        <a href="http://www.albarakeh.com/">
                            <img src="./images/client4.jpg" alt="البركة">
                        </a>
                    </div>
                    <div class="col-xs-12 col-md-2 client">
                        <a href="http://www.nestle.com/">
                            <img src="./images/client5.jpg" alt="نستلة">
                        </a>
                    </div>
                </div>
            </div> 
        </div>  <!-- نهاية قسم العملاء -->

        <!-- بداية أحدث التدوينات -->
        <div class="row">
            <div class="container">
                <div class="col-xs-12 center">
                    <h2>أحدث التدوينات</h2>
                </div>
                @foreach($plugs->slice(0, 3) as $key => $plug)
                <div class="col-xs-12 col-md-4" id="new-blogs">
                    <div class="thumbnail custom-thumbnail">
                        <img src="/storage/{{$plug->image}}" alt="{{$plug->title}}">
                        <div class="caption">
                            <h4>{{$plug->title}}</h4>
                            <p>{{$plug->head}}</p>
                            <a href="/plugs/{{$plug->id}}" class="btn btn-default custom-btn">التفاصيل</a>
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>
        </div>   <!-- نهاية أحدث التدوينات -->
        @endsection('content')