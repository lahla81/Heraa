@extends('layouts.heraa')

@section('title')
الصفحة الرئيسية
@endsection('title')

@section('main-nav')
class="active"
@endsection('main-nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="padding:100px;" class="card">
                <div class="card-header">لوحة التحكم</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   تم تسجيل الدخول بنجاح!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
