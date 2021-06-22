@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
    <p>{{session('status')}}</p>
    @endif

    @foreach($categories as $category)
    <a class="badge badge-secondary" href="{{route('articles.categorized', $category)}}">{{$category->name}}</a>
    @endforeach
    <h1>Blog Articles Overview</h1>
    <a class="btn btn-primary" href="{{ route('article.create')}}" role="button">New Article</a>
    <ol>
        @foreach ($articles as $article)
        <li>

            <h3><a href="{{route('article.show', $article->id)}}">{{$article->title}} -
                    {{$article->created_at->diffForHumans()}}</a></h3>
            <p>{{$article->user->name}} ({{$article->user->email}})</p>

            @foreach($article->categories as $articleCategory)
            <a class="badge badge-secondary"
                href="{{route('articles.categorized', $articleCategory)}}">{{$articleCategory->name}}</a>
            @endforeach

            <p>{{$article->excerpt}}</p>

            @if($article->user_id == Auth::id())
            <a class="btn btn-primary" href="{{ route('article.edit', $article->id)}}" role="button">Edit</a>
            @endif

            @if($article->user_id == Auth::id())
            <form method="POST" action="{{route('article.destroy', $article)}}">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" type="submit">Löschen</button>
            </form>
            @endif
        </li>
        @endforeach
    </ol>
    <div>{{$articles->links()}}</div>
</div>
@endsection
