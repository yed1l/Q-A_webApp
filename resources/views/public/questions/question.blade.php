@extends('public.layouts.app')
@section('content')
    <div class="container">
        @include('public.partials.structure_question')
        @foreach( $question->comments as $comment)
            <div class="card container">
                {{ $comment->content }} — {{$question->user->nick}}  [ {{ $question->created_at }} ]
            </div>
            <p></p>
                @endforeach
        <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseReply">
            Responder</button>
        <div class="collapse" id="collapseReply">
            @include('public.partials.comments')
        </div>
    </div>
@endsection
