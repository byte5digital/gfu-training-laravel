@extends('layouts.app')

@section('content')
<div class="container">
@if (session('status'))
<p>{{session('status')}}</p>

@endif

       <h1>Blog Articles Overview</h1>
       <a class="btn btn-primary" href="{{ route('article.create')}}" role="button">New Article</a>
       <ol>
       @foreach ($articles as $article)
           <li>

           <h3><a href="{{route('article.show', $article->id)}}">{{$article->title}} - {{$article->created_at->diffForHumans()}}</a></h3>
           <p>{{$article->excerpt}}</p>

       <a class="btn btn-primary" href="{{ route('article.edit', $article->id)}}" role="button">Edit</a>
       <form method="POST" action="{{route('article.destroy', $article)}}">
       @method('DELETE')
       @csrf
       <button class="btn btn-danger" type="submit">Löschen</button>
       </form>
           </li>
       @endforeach
       </ol>
    </body>
</html>

@endsection
