@extends('admin.layouts.app')
@section('content')
    <div class="container">
        @include('partials.structure_question')
        @foreach( $question->comments as $comment)
            <div class="card container">
                <h2{{ $comment->content }} — {{ $question->created_at }}</h2>
            </div>
            <p></p>
        @endforeach
        @include('partials.comments')
    </div>
@endsection
