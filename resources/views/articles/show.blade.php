@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Blog Article - {{$article->title}}</h1>
    <p>{{$article->text}}</p>

    <a class="btn btn-primary" href="{{ url()->previous()}}" role="button">Zurück</a>

</div>
@endsection
