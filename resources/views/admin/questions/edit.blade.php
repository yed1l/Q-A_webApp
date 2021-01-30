@extends('admin.layouts.app')

@push('scripts')
    <script src="{{ asset('js/validation.js') }}" defer></script>
@endpush

@section('content')

    <div class="container">
        <h1>Editando: {{$question->title}}</h1>
        <span class="col-1"></span>
        <div class="row">
            <div class="col-3">
                @include('admin.partials.aside_nav_bar')
            </div>

            <div class="col-9">
                <form action="{{route('admin.question.edit',['slug' => $question->slug]) }}" id="formulario"
                      method="post">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="container">
                        <div class="form-group row">
                            <div class="form-group col-12">
                                <label for="title">Título</label>
                                <input type="text" placeholder="{{$question->title}}" id="title" name="title"
                                       class="form-control">
                                @if($errors->has('title'))
                                    <div>
                                        @foreach($errors->get('title') as $message)
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
                                <label for="category">Selecciona categoría</label>
                                <select class="form-control" name="category" id="category">
                                    <option value="" selected>{{$question->category}}</option>
                                    <option value="Sociedad">Sociedad</option>
                                    <option value="Tecnología">Tecnología</option>
                                    <option value="Ciencia">Ciencia</option>
                                    <option value="Cultura">Cultura</option>
                                    <option value="Ocio">Ocio</option>
                                    <option value="Deportes">Deportes</option>
                                    <option value="Moda">Moda</option>
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
                        <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection