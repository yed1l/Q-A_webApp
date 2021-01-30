@extends('public.layouts.app')

@push('scripts')
    <script src="{{ asset('js/validation.js') }}" defer></script>
    <script src="{{asset('js/delete.js')}}"></script>
@endpush

@section('content')
    <div class="container">
        <h1>Perfil de {{ Auth::user()->nick }}</h1>
        <span class="col-1"></span>
        <div class="row">
            <div class="col-3">
                @include('public.partials.aside_nav_bar')
            </div>
            <div class="col-9">
                @include('public.questions.postList')
            </div>
        </div>
    </div>
@endsection