@extends('public.layouts.app')

@section('content')
    <div class="container justify-content-center">
        <h1>
            Welcome to Question and Answer. A platform where you will find answers to all your questions.
        </h1><form action="/search" method="POST" role="search">
             			{{ csrf_field() }}
             			<div class="input-group">
             				<input type="text" class="form-control" name="q"
             					placeholder="Search"> <span class="input-group-btn">
             					<div class="col-md-6">
                                      <button class="btn btn-success">Search</button>
                                </div>
             				</span>
             			</div>
             		</form>



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
