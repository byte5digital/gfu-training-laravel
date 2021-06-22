@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Category - {{$category->name}}</h1>
    <a class="btn btn-primary" href="{{ url()->previous()}}" role="button">Zurück</a>

</div>
@endsection
