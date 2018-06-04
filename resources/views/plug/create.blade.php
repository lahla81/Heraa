@extends('layouts.heraa')

@section('title')
إضافة مقالة جديدة
@endsection('title')

@section('plug-nav')
class="active"
@endsection('plug-nav')

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
                    <input type="text" id="title" name="title" placeholder="Title" class="form-control{{ $errors->has('Title') ? ' is-invalid' : '' }}" value="{{old('title',isset($plug)?$plug->title:null)}}">
                    @if ($errors->has('title'))
                        <span class="alert-danger">
                            <strong>{{$errors->first('title')}}</strong>    
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="slug" class="col-2 control-label text-right" style="line-height:1.6; font-weight:bold; padding:.375rem .75rem; margin-bottom:0;">Slug</label>
                <div class="col-6">
                    <input type="text" id="slug" name="slug" placeholder="Slug" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" value="{{old('slug',isset($plug)?$plug->slug:null)}}">
                    @if ($errors->has('slug'))
                        <span class="alert-danger">
                            <strong>{{$errors->first('slug')}}</strong>    
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="head" class="col-2 control-label text-right" style="line-height:1.6; font-weight:bold; padding:.375rem .75rem; margin-bottom:0;">Head</label>
                <div class="col-6">
                    <textarea type="text" id="head" name="head" placeholder="Head" class="form-control{{ $errors->has('head') ? ' is-invalid' : '' }}" row="2">{{old('head',isset($plug)?$plug->head:null)}}</textarea>
                    @if ($errors->has('head'))
                        <span class="alert-danger">
                            <strong>{{$errors->first('head')}}</strong>    
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="subtitle" class="col-2 control-label text-right" style="line-height:1.6; font-weight:bold; padding:.375rem .75rem; margin-bottom:0;">Subtitle</label>
                <div class="col-6">
                    <input type="text" id="subtitle" name="subtitle" placeholder="Subtitle" class="form-control{{ $errors->has('subtitle') ? ' is-invalid' : '' }}" value="{{old('subtitle',isset($plug)?$plug->subtitle:null)}}">
                    @if ($errors->has('subtitle'))
                        <span class="alert-danger">
                            <strong>{{$errors->first('subtitle')}}</strong>    
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="body" class="col-2 control-label text-right" style="line-height:1.6; font-weight:bold; padding:.375rem .75rem; margin-bottom:0;">Body</label>
                <div class="col-6">
                    <textarea type="text" id="body" name="body" placeholder="Body" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" row="3">{{old('body',isset($plug)?$plug->body:null)}}</textarea>
                    @if ($errors->has('body'))
                        <span class="alert-danger">
                            <strong>{{$errors->first('body')}}</strong>    
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="image" class="col-2 control-label text-right" style="line-height:1.6; font-weight:bold; padding:.375rem .75rem; margin-bottom:0;">Image</label>
                <div class="col-6">
                    <input type="file" id="image" name="image" placeholder="Image" class="form-control{{ $errors->has('v') ? ' is-invalid' : '' }}" value="{{old('image',isset($plug)?$plug->image:null)}}">
                    @if ($errors->has('image'))
                        <span class="alert-danger">
                            <strong>{{$errors->first('image')}}</strong>    
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-8 offset-4">
                <button type="submit" class="btn btn-primary">ADD new Plug</button>
            </div>

        </form>
    </div>
</div>
</div>


@endsection('content')