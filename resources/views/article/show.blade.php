@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Blog Article - {{$article->title}}</h1>
    <p>{{$article->text}}</p>
    <!-- Get Image Path with asset() + img_url -->
    <img src="{{asset('storage').$article->img_url}}" width="150" height="150" alt="{{$article->title}}">
    <br/>
    <br/>
    <a class="btn btn-primary" href="{{ url()->previous()}}" role="button">Zurück</a>

</div>
@endsection
