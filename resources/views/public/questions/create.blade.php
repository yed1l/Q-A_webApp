@extends('public.layouts.app')

@push('scripts')
    <script src="{{ asset('js/validation.js') }}" defer></script>
@endpush

@section('content')
    <form action="/questions/create" id="formulario" method="post">
        {{ csrf_field() }}

        <div class="container">
            <div class="form-group row">
                <div class="form-group col-12">
                    <label for="title">Título</label>
                    <input type="text" placeholder="Escribe un título..." id="title" name="title" class="form-control">
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
                    <label for="category">Selecciona categoría</label>
                    <select class="form-control" name="category" id="category">
                        <option value="" selected>...</option>
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
                    <input type="text" placeholder="Escribe etiquetas..." id="hashtagInput" name="hashtag"
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
                          placeholder="Máximo de 500 caracteres" class="form-control" rows="10"></textarea>
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
            <input type="submit" id="send" class="btn btn-primary">
        </div>
    </form>
@endsection