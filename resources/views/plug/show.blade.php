@extends('layouts.heraa')
       
        @section('title')
        المدونة
        @endsection('title')

        @section('plug-nav')
        class="active"
        @endsection('plug-nav')
        
        @section('content')
        <!-- صورة البنر -->
        <div class="row">
            <div class="col-xs-12" id="banner">
                <div class="overlay">
                    <h1 class="hidden-xs hidden-sm">{{$plug->title}}</h1>
                    <h3 class="visible-xs visible-sm">{{$plug->title}}</h3>
                </div>
                <img src="/images/banner-blog-title.jpg" alt="عنوان التدوينة">
            </div>
        </div>
        <!-- نهاية صورة البنر -->

         <!-- بداية المدونات -->
         <div class="row">
            <div class="container">
                <div class="col-md-7 col-md-offset-1">
                    <div class="blog-img">
                        <img src="/storage/{{$plug->image}}" alt="{{$plug->title}}">
                    </div>
                    <div class="blog-details">
                        <h2>{{$plug->title}}</h2>
                        <div class="blog-date">
                            <i class="fa fa-clock-o"></i>
                            {{\Carbon\Carbon::parse($plug->created_at)->diffForHumans()}} بواسطة 
                            <a href="#">{{$plug->user_id}}</a>
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
                            <a style="float:left; margin-left:10px;" href="{{route('plugs.edit',['id'=>$plug->id])}}" class="btn btn-default btn-warning"><i class="fa fa-pencil"></i></a>
                        </div>
                        <div class="line"></div>
                        <p>{{$plug->head}}</p>
                        <h3>{{$plug->subtitle}}</h3>
                        <p>{{$plug->body}}</p>
                        <div class="line"></div>
                        <div>
                            <span class="share-blog">شارك المقال</span>
                            <span class="social-share">
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                                </span>
                        </div>
                        <hr>
                        <h3>التعليقات</h3>
                        <ul class="list-group comments-list">
                            @foreach($plug->plugcomments as $comment)
                            <li class="list-group-item">
                               <div> <a href="">{{$comment->user->name}}</a> <strong>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</strong> </div>

                                <a href="#" onclick="event.preventDefault();
                                    var del= confirm('Are you sure that you want to delete Comment no{{$comment->id}}?');
                                    if(del==true){
                                        document.getElementById('delete-form').submit();}">
                                        <i class="fa fa-trash"></i>
                                </a>
                                <form id="delete-form" action="{{route('plugcomments.destroy',['id'=>$comment->id])}}" method="POST" style="display:none;">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                </form>

                                <a href="#" onclick="event.preventDefault();
                                        document.getElementById('edit-form').submit();}">
                                        <i class="fa fa-pencil"></i>
                                </a>
                                <form id="edit-form" action="{{route('plugcomments.edit',$comment->id)}}" method="POST" style="display:none;">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                </form>

                                {{$comment->comment}}
                            </li>
                            @endforeach
                            <li class="list-group-item">
                                <form action="{{route('plugcomments.store')}}" method='POST' class="form-horizontal">
                                    {{csrf_field()}}
                                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                    <input type="hidden" name="plug_id" value="{{$plug->id}}">
                                    <div class="input-group row ">
                                        <input type="text" id="comment" name="comment" placeholder="أضف تعليق" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" value="{{old('comment')}}">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-defualt"><i class="fa fa-angle-double-left"></i></button>
                                        </span>
                                        @if ($errors->has('comment'))
                                            <span class="alert-danger">
                                                <strong>{{$errors->first('comment')}}</strong>    
                                            </span>
                                        @endif
                                    </div>  
                                </form>
                            </li>
                        </ul>
                    </div>
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
