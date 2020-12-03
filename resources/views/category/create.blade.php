@extends('layouts.app')

@section('content')
<div class="container">
<h1>Neue Kategorie</h1>
<form action="{{route('category.store')}}" method="POST">
@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" />
    {{-- Include view errors.excerpt --}}
    @include('errors.name')
    </div>
    
    <button type="submit" class="btn btn-success">Speichern</button>
</form>
</div>
@endsection
