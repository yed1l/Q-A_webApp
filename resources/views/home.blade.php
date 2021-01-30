@extends('public.layouts.app')

@section('content')
    <div class="container justify-content-center">
        <h1>
            Welcome to Question and Answer. A platform where you will find answers to all your questions.
        </h1>
    </div>

    <div class="container">
        @include('public.questions.viewQuestion')
        <div>
            <ul class="pagination justify-content-center">
                {{ $questions->links() }}
            </ul>
        </div>
    </div>
@endsection
