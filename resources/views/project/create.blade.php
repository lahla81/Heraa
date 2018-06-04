@extends('layouts.heraa')

@section('title')
إضافة مشروع جديدة
@endsection('title')

@section('project-nav')
class="active"
@endsection('project-nav')

@section('content')

<div class="row justify-content-center" dir="ltr">
<div class="container">
    <div class="col-8">
        <form action="{{$action}}" method='POST' class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            @if($method=='put')
                {{method_field('PUT')}}
            @endif
            <div class="form-group row justify-content-center">
                <label for="title" class="col-2 control-label text-right" style="line-height:1.6; font-weight:bold; padding:.375rem .75rem; margin-bottom:0;">Title</label>
                <div class="col-6">
                    <input type="text" id="title" name="title" placeholder="Title" class="form-control{{ $errors->has('Title') ? ' is-invalid' : '' }}" value="{{old('title',isset($project)?$project->title:null)}}">
                    @if ($errors->has('title'))
                        <span class="alert-danger">
                            <strong>{{$errors->first('title')}}</strong>    
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="excerpt" class="col-2 control-label text-right" style="line-height:1.6; font-weight:bold; padding:.375rem .75rem; margin-bottom:0;">Excerpt</label>
                <div class="col-6">
                    <input type="text" id="excerpt" name="excerpt" placeholder="Excerpt" class="form-control{{ $errors->has('excerpt') ? ' is-invalid' : '' }}" value="{{old('excerpt',isset($project)?$project->excerpt:null)}}">
                    @if ($errors->has('excerpt'))
                        <span class="alert-danger">
                            <strong>{{$errors->first('excerpt')}}</strong>    
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="description" class="col-2 control-label text-right" style="line-height:1.6; font-weight:bold; padding:.375rem .75rem; margin-bottom:0;">Description</label>
                <div class="col-6">
                    <textarea type="text" id="description" name="description" placeholder="Description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" row="2">{{old('description',isset($project)?$project->description:null)}}</textarea>
                    @if ($errors->has('description'))
                        <span class="alert-danger">
                            <strong>{{$errors->first('description')}}</strong>    
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="category" class="col-2 control-label text-right" style="line-height:1.6; font-weight:bold; padding:.375rem .75rem; margin-bottom:0;">category</label>
                <div class="col-6">
                    <input type="text" id="category" name="category" placeholder="category" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" value="{{old('category',isset($project)?$project->category:null)}}">
                    @if ($errors->has('category'))
                        <span class="alert-danger">
                            <strong>{{$errors->first('category')}}</strong>    
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="image" class="col-2 control-label text-right" style="line-height:1.6; font-weight:bold; padding:.375rem .75rem; margin-bottom:0;">Image</label>
                <div class="col-6">
                    <input type="file" id="image" name="image" placeholder="Image" class="form-control{{ $errors->has('v') ? ' is-invalid' : '' }}" value="{{old('image',isset($project)?$project->image:null)}}">
                    @if ($errors->has('image'))
                        <span class="alert-danger">
                            <strong>{{$errors->first('image')}}</strong>    
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-8 offset-4">
            @if($method=='put')
                <button type="submit" class="btn btn-primary">تحديث المشروع</button>
            @else
                <button type="submit" class="btn btn-primary">إضافة مشروع جديد</button>
            @endif
                
            </div>

        </form>
    </div>
</div>
</div>


@endsection('content')