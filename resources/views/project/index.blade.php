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
                    <h1 class="hidden-xs hidden-sm">أعمال الشركة</h1>
                    <h3 class="visible-xs visible-sm">أعمال الشركة</h3>
                </div>
                <img src="/images/projects-banner.jpg" alt="أعمال الشركة">
            </div>
        </div>
        <!-- نهاية صورة البنر -->

        <!-- المشاريع -->
        <div class="row">
            <div class="container">
            <a style="margin-top:20px;" class="btn btn-default btn-warning" href="{{route('projects.create')}}">إضافة مشروع جديد</a>
                <div id="our-projects">
                @if (count($projects))
                @foreach($projects as $key => $project)
                    <div class="col-md-4 col-xs-12 col-sm-6">
                        <div class="thumnail custom-project-thumbnail">
                            <img src="/storage/{{$project->image}}" alt="{{$project->title}}">
                            <div class="caption">
                                <a href="#" class="btn btn-default project-category">{{$project->category}}</a>
                                <h4>{{$project->title}}</h4>
                                <p>{{$project->excerpt}}</p>
                                <a href="projects/{{$project->id}}" class="btn btn-default custom-btn">تصفح المشروع</a>
                            </div>
                        </div>
                    </div>
                @endforeach 
                @else
                    <h3>لا توجد مشاريع</h3>
                @endif
                </div>
            </div>
        </div>
        <!--  نهاية المشاريع -->
        
        @endsection('content')