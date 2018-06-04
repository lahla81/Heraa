@extends('layouts.heraa')

        @section('title')
        المدونات
        @endsection('title')

        @section('plug-nav')
        class="active"
        @endsection('plug-nav')
        
        @section('content')
        <!-- صورة البنر -->
        <div class="row">
            <div class="col-xs-12" id="banner">
                <div class="overlay">
                    <h1 class="hidden-xs hidden-sm">المدونات</h1>
                    <h3 class="visible-xs visible-sm">المدونات</h3>
                </div>
                <img src="/images/banner-blog-title.jpg" alt="المدونات">
            </div>
        </div>
        <!-- نهاية صورة البنر -->

        <!-- بداية المدونات -->
        <div class="row">
            <div class="container" id="blogs">
                <div class="col-md-7 col-md-offset-1">
                <a href="{{route('plugs.create')}}" class="btn btn-default btn-warning">إنشاء مقالة جديدة</a>
                @if (count($plugs))
                @foreach($plugs as $key => $plug)
                    <div id="blog-summary" class="col-xs-12">
                        <div class="media custom-media">
                            <div class="media-middle media-left">
                            <a href="#">
                                <img class="media-object" src="/storage/{{$plug->image}}" alt="{{$plug->title}}">
                            </a>
                            </div>
                            <div class="media-body">
                            <h4>{{$plug->title}}</h4>
                            <p class="blog-post-meta">{{\Carbon\Carbon::parse($plug->created_at)->diffForHumans()}} بواسطة <a href="#">{{$plug->user->name}}</a></p>
                            <p>{{$plug->head}} <a href="/plugs/{{$plug->id}}" class="btn">قراءة المزيد ...</a></p>
                            
                            <a style="float:left;" href="{{route('plugs.destroy',['id'=>$plug->id])}}" class="btn btn-default btn-danger"
                                onclick="event.preventDefault();
                                    var del= confirm('Are you sure that you want to delete Plug {{$plug->slug}}?');
                                    if(del==true){
                                        document.getElementById('plug-delete-form').submit();}">
                                        <i class="fa fa-trash"></i>
                            </a>
                            <form id="plug-delete-form" action="{{route('plugs.destroy',['id'=>$plug->id])}}" method="POST" style="display:none;">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                            </form>
                            </div>
                        </div>
                    </div>
                @endforeach 
                @else
                    <h3>لا توجد مدونات</h3>
                @endif
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="search-box">
                        <h4>البحث فى المدونة</h4>
                        <div class="line"></div>
                        <form action="" class="form-inline">
                            <div class="input-group">
                                <input type="text" placeholder="كلمة البحث" class="form-control">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default btn-search">ابحث الآن</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="p-3">
                        <h4 class="font-italic">الأرشيف</h4>
                        <ol class="list-unstyled mb-0">
                        @foreach($archives as $archive)
                        <li><a href="/plugs/{{$archive->year}}/{{$archive->month_number}}">{{$archive->month.' '.$archive->year.' ('.$archive->plugs_count.')'}}</a></li>
                        @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div> <!-- نهاية المدونات -->
        @endsection('content')