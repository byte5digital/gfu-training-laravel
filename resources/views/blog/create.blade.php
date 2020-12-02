@extends('layouts.app')

@section('content')
<div class="container">
<h1>Neuen Eintrag</h1>
<form action="{{route('blog.store')}}" method="POST">
@csrf
<div class="form-group">
    <label for="headline">Headline</label>
    <input type="text" name="headline" id="headline" />
    </div>
    <div class="form-group">
    <label for="content">Content</label>
    <input type="text" name="content" id="content" />
    </div>
    <button type="submit" class="btn btn-success">Speichern</button>
</form>
</div>
@endsection
