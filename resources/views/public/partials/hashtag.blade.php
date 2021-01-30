<div class="tags">
    @foreach($question->hashtags->pluck('name')->toArray() as $hashtag)
        <span class="badge badge-info">{{ $hashtag }}</span>
    @endforeach
</div>