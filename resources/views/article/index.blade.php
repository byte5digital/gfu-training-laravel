@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <p>{{session('status')}}</p>
    @endif

    @foreach($categories as $category)
        <a class="badge badge-secondary">{{$category->name}}</a>
    @endforeach
    <h1>Blog Articles Overview</h1>

    <a class="btn btn-primary" href="{{ route('article.create')}}" role="button">New Article</a>

    <br/>
    <br/>

    @foreach ($articles as $article)
        <div class="card">
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
                <h6 class="card-subtitle mb-2 text-muted">{{$article->excerpt}}</h6>

                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                @if($article->user_id == Auth::id())
                    <a class="card-link" href="{{ route('article.edit', $article->id)}}" role="button">Edit</a>
                @endif

                @if($article->user_id == Auth::id())
                    <form method="POST" action="{{route('article.destroy', $article)}}">
                        @method('DELETE')
                        @csrf
                        <button class="card-link" type="submit">Löschen</button>
                    </form>
                @endif
            </div>
        </div>

        <br/>
    @endforeach

    <div>{{ $articles->links() }}</div>
</div>
@endsection
