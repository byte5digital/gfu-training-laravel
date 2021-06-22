@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
    <p>{{session('status')}}</p>
    @endif


    @forelse($categories as $category)
    <h1><a href="{{route('category.show', $category->id)}}" role="button">{{$category->name}}</a></h1>

    <a class="btn btn-secondary" href="{{ route('category.edit', $category->id)}}" role="button">Edit</a>
    <form method="POST" action="{{route('category.destroy', $category)}}">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" type="submit">Löschen</button>
    </form>

    @empty

    <p>No Categories!</p>

    @endforelse



</div>
@endsection
