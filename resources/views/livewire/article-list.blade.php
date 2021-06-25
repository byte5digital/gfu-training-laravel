<div>
    @foreach ($articles as $article)
        <div class="card mb-2">
            <div class="card-body">
                @foreach($article->categories as $articleCategory)
                    <a class="badge badge-secondary">{{$articleCategory->name}}</a>
                @endforeach

                <h5 class="card-title">
                    <a href="{{route('article.show', $article->id)}}">
                        {{$article->title}} - {{$article->created_at->diffForHumans()}}
                    </a>
                </h5>
                <p><b>{{$article->user->first_name}}</b> ( {{$article->user->name}} - {{$article->user->email}})</p>
                <h6 class="card-subtitle mb-2 text-muted" wire:click="editExcerpt({{$article->id}})">
                    @if ($editExcerpt === $article->id)
                        <input type="text" class="form-control" wire:model="editedExcerpt" wire:keydown.enter="saveExcerpt({{ $article->id }})">
                    @else
                        {{ $article->excerpt }}
                    @endif
                </h6>

                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                @if($article->user_id == Auth::id())
                    <a class="card-link" href="{{ route('article.edit', $article->id)}}" role="button">Edit</a>
                @endif

                @if($article->user_id == Auth::id())
                    <button class="btn btn-danger" wire:click="deleteArticle({{ $article->id }})">Löschen</button>
                @endif
            </div>
        </div>
    @endforeach

    <div>{{ $articles->links() }}</div>
</div>
