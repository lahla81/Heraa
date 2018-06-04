@extends('layouts.heraa')

@section('title')
المشاريع
@endsection('title')

@section('project-nav')
class="active"
@endsection('project-nav')

@section('content')
        <!-- صورة البنر -->
        <div class="row">
            <div class="col-xs-12" id="banner">
                <div class="overlay">
                    <h1 class="hidden-xs hidden-sm">{{$project->title}}</h1>
                    <h3 class="visible-xs visible-sm">{{$project->title}}</h3>
                </div>
                <img src="{{asset('images/banner-blog-title.jpg')}}" alt="{{$project->title}}">
            </div>
        </div>
        <!-- نهاية صورة البنر -->

         <!-- بداية المشروع -->
         <div class="row">
            <div class="container">
                <div class="col-md-7 col-md-offset-1">
                    <div class="blog-img">
                        <img src="/storage/{{$project->image}}" alt="{{$project->title}}">
                    </div>
                    <a style="float:left;" href="{{route('projects.destroy',['id'=>$project->id])}}" class="btn btn-default btn-danger"
                        onclick="event.preventDefault();
                            var del= confirm('Are you sure that you want to delete Project {{$project->title}}?');
                            if(del==true){
                                document.getElementById('project-delete-form').submit();}">
                                <i class="fa fa-trash"></i>
                    </a>
                    <form id="project-delete-form" action="{{route('projects.destroy',['id'=>$project->id])}}" method="POST" style="display:none;">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                    </form>
                    <a style="float:left;margin-left:10px;" class="btn btn-warning" href="{{route('projects.edit', ['id'=>$project->id])}}"><i class="fa fa-pencil"></i></a>
                    <div class="blog-details">
                        <h2>{{$project->title}}</h2>
                        <div class="blog-date"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($project->created_at)->diffForHumans()}} بواسطة <a href="#">{{$project->user->name}}</a></div>
                        <h3>نبذة عن المشروع</h3>
                        <div class="line"></div>
                        <p>{{$project->description}}</p>
                        <div class="line"></div>
                        <div>
                            <span class="share-blog">شارك المشروع</span>
                            <span class="social-share">
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            </span>
                        </div>
                        <hr>
                        <h3>التعليقات</h3>
                        <ul class="list-group comments-list">
                            @foreach($project->comments as $comment)
                            <li class="list-group-item">
                                <div>
                                    <a href="">{{$comment->user->name}}</a>
                                    <strong>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</strong>
                                </div>
                                {{$comment->comment}} 
                            </li>
                            @endforeach
                            <li class="list-group-item">
                                <form action="{{route('comments.store')}}" method='POST' class="form-horizontal comment-form" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                    <input type="hidden" name="project_id" value="{{$project->id}}">
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
                        <h4>البحث فى المشاريع</h4>
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
                </div>
            </div>
        </div> <!-- نهاية المشروع -->
@endsection('content')