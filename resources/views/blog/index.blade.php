@extends('layouts.app')

@section('content')
<div class="container">
<h1>Blog Einträge</h1>
@foreach ($blogEntries as $blogEntry)
    <div class="row">
        <div class="col-1">
            {{$blogEntry->id}}
        </div>
        <div class="col-2">
            {{$blogEntry->headline}}
        </div>
        <div class="col-2">
            <a class="btn btn-primary" href="{{route('blog.show', $blogEntry)}}">Anzeigen</a>
        </div>
        <div class="col-2">
            <form action="{{route('blog.destroy', $blogEntry)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Löschen</button>
            </form>
        </div>
    </div>
@endforeach
<div class="row">
    <div class="col-2">
        <a href="{{route('blog.create')}}" class="btn btn-success">Neuer Eintrag</a>
    </div>
</div>
</div>
@endsection
