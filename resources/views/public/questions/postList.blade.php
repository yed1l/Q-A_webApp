<table class="table table-striped">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Question</th>
        <th scope="col">Date of creation</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($questions as $question)
        <tr id="question{{$question->id}}">
            <td>
                <a href="/questions/{{$question->slug }}">{{$question->title}}</a>
            </td>
            <td>
                {{$question->created_at}}
            </td>
            <td>
                <a class="" href="/questions/update/{{$question->slug}}">
                    <i class="far fa-edit fa-2x text-info"></i>
                </a>
            </td>

            <td>
                <form action="/questions/destroy/{{ $question->id }}" method="post">
                    <input type="hidden" name="_method" value="delete"/>
                    {!! csrf_field() !!}
                </form>
                <a class="" data-type="delete" href="#">
                    <i data-idelement="{{$question->id}}" class="fas fa-trash-alt fa-2x text-danger"></i>
                </a>
            </td>
        </tr>
    @endforeach
    @include('public.partials.modal_delete')
    </tbody>
</table>