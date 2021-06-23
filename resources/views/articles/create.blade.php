@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create new Article</h1>
    <form method="POST" action="{{ route('article.store')}}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="title" class="col-4 col-form-label">Title</label>
            <div class="col-8">
                <input id="title" name="title" type="text" class="form-control">
                @error('title')
                <p class="is-danger">{{$errors->first('title')}}</p>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="excerpt" class="col-4 col-form-label">Excerpt</label>
            <div class="col-8">
                <textarea id="excerpt" name="excerpt" cols="40" rows="5" class="form-control"></textarea>
                @error('excerpt')
                <p class="is-danger">{{$errors->first('excerpt')}}</p>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Text</label>
            <div class="col-8">
                <textarea id="text" name="text" cols="40" rows="5" class="form-control"></textarea>
                @error('text')
                <p class="is-danger">{{$errors->first('text')}}</p>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="image" class="col-4 col-form-label">Image</label>
            <div class="col-8">
                <input id="image" name="image" type="file" class="form-control" >
                @error('image')
                <p class="is-danger">{{$errors->first('image')}}</p>
                @enderror
            </div>
        </div>

        <select name="categories[]" multiple class="form-control">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>

        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

</div>
@endsection
