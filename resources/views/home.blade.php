@extends('public.layouts.app')

@section('content')
    <div class="container justify-content-center">
        <h1>
            Bienvenido a QA Web. La web donde encontrarás respuestas a todas tus preguntas.
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
