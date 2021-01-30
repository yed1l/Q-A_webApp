@extends('public.layouts.app')
@push('scripts')
    <script src="{{ asset('js/validation.js') }}" defer></script>
    <script src="{{asset('js/update.js')}}"></script>
@endpush

@section('content')

    <div class="container">
        <div class="row">
            {{--<span class="col-1"></span>--}}
            <div class="col-3">
                @include('public.partials.aside_nav_bar')
            </div>
            <div class="col-9">

                <form action="{{route('question.patch',['slug' => $question->slug]) }}" id="formulario" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="container">
                        <div class="form-group row">
                            <div class="form-group col-12">
                                <label for="title">Title</label>
                                <input type="text" placeholder="{{$question->title}}" id="title" name="title"
                                       class="form-control">
                                @if($errors->has('content'))
                                    <div>
                                        @foreach($errors->get('content') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="category">Category</label>
                                <select class="form-control" name="category" id="category">
                                    <option value="" selected>...</option>
                                    <option value="Society">Society</option>
                                    <option value="Technology">Technology</option>
                                    <option value="Science">Science</option>
                                    <option value="Culture">Culture</option>
                                    <option value="Health">Health</option>
                                    <option value="Sport">Sport</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="General">General</option>
                                </select>
                                @if($errors->has('category'))
                                    @foreach($errors->get('category') as $message)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @endforeach
                                @else
                                    <div></div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="hashtagInput">Etiquetas</label>
                                <input type="text" placeholder="{{$question->hashtag}}" id="hashtagInput" name="hashtag"
                                       class="form-control">
                                @if($errors->has('hashtag'))
                                    @foreach($errors->get('hashtag') as $message)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="content">Escribe tu pregunta</label>
                            <textarea name="content" id="content"
                                      placeholder="{{$question->content}}" class="form-control" rows="10"></textarea>
                            @if($errors->has('content'))
                                @foreach($errors->get('content') as $message)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @else
                                <div></div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Actualizar pregunta') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



