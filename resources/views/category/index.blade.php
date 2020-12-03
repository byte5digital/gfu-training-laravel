@extends('layouts.app')

@section('content')
<div class="container">
<h1>Kategorien</h1>
@foreach ($categories as $category)
    <div class="row">
        <div class="col-1">
            {{$category->id}}
        </div>
        <div class="col-2">
        <a href="{{route('category.show', $category->id)}}" >{{$category->name}}</a>
            
        </div>
      
    </div>
@endforeach
@auth
<div class="row">
    <div class="col-2">
        <a href="{{route('category.create')}}" class="btn btn-success">Neue Kategorie</a>
    </div>
</div>
@endauth
</div>
@endsection
