@extends('admin.layouts.app')
@section('content')
    <div class="container">
        @include('partials.structure_question')
        @foreach( $question->comments as $comment)
            <div class="card container">
                {{ $comment->content }} — {{ $question->created_at }}
            </div>
            <p></p>
        @endforeach
        @include('partials.comments')
    </div>
@endsection
