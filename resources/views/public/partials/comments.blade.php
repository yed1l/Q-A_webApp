<form action="/questions/{{$question->slug}}/comments" id="formulario" method="post">
    {{ csrf_field() }}

    <div class="container">
        <div class="form-group">
            <label for="content">Escribe tu respuesta</label>
            <textarea name="content" id="content"
                      placeholder="Responde a esta pregunta..." class="form-control" rows="5"></textarea>
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