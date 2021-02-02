@extends('admin.layouts.app')

@push('scripts')
    <script src="{{ asset('js/validation.js') }}" defer></script>
@endpush

@section('content')
    <form action="/questions/create" id="formulario" method="post">
        {{ csrf_field() }}

        <div class="container">
            <div class="form-group row">
                <div class="form-group col-12">
                    <label for="title">Title</label>
                    <input type="text" placeholder="Write a title..." id="title" name="title" class="form-control">
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
                    <label for="hashtagInput">Tags</label>
                    <input type="text" placeholder="Write tag" id="hashtagInput" name="hashtag"
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
                <label for="content">Enter your question</label>
                <textarea name="content" id="content"
                          placeholder="1000 characters maximum" class="form-control" rows="10"></textarea>
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