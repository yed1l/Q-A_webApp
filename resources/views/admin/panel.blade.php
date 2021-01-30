@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Perfil de administración de {{ Auth::user()->nick }}</h1>
        <span class="col-1"></span>
        <div class="row main-area">
            <div class="col-md-3">
                @include('admin.partials.aside_nav_bar')
            </div>
            <div class="col-md-9">
                @include('admin.questions.postList')
            </div>
        </div>
    </div>
@endsection