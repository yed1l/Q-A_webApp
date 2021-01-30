<div class="card" style="margin-bottom: 2em">
    <div class="card-header">
        <h2 class="card-title">
            <a href="/questions/{{$question->slug }}">{{$question->title}}</a>
        </h2>
        <p class="card-subtitle"><span class="badge badge-warning">{{ $question->category }}</span></p>
        @include('admin.partials.hashtag')
    </div>
    <p class="card-body">{{$question->content}}</p>

    <p class="container">
        Creado el {{ $question->created_at }} — {{ $question->user->nick }} <span class="badge badge-primary">{{$question->user->role}}</span>
    </p>
</div>