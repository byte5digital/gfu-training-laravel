@extends('layouts.app')

@section('content')
<div class="container">
<h1>Eintrag Update</h1>
<form action="{{route('blog.update', $blog)}}" method="POST">
@csrf
<div class="form-group">
    <label for="headline">Headline</label>
    <input type="text" name="headline" id="headline" value="{{$blog->headline}}"/>
    </div>
    <div class="form-group">
    <label for="content">Content</label>
    <input type="text" name="content" id="content" value="{{$blog->content}}" />
    </div>
    <button type="submit" class="btn btn-success">Speichern</button>
</form>
</div>
@endsection
