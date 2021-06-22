@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Update Article</h1>
    <form method="POST" action="{{ route('article.update', $article->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="title" class="col-4 col-form-label">Title</label>
            <div class="col-8">
                <input id="title" name="title" type="text" class="form-control"
                    value="{{old('title', $article->title)}}">
                @error('title')
                <p>{{$errors->first('title')}}</p>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="excerpt" class="col-4 col-form-label">Excerpt</label>
            <div class="col-8">
                <textarea id="excerpt" name="excerpt" cols="40" rows="5"
                    class="form-control">{{old('excerpt', $article->excerpt)}}</textarea>
                @error('excerpt')
                <p>{{$errors->first('excerpt')}}</p>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Text</label>
            <div class="col-8">
                <textarea id="text" name="text" cols="40" rows="5"
                    class="form-control">{{old('text', $article->text)}}</textarea>
                @error('text')
                <p>{{$errors->first('text')}}</p>
                @enderror
            </div>
        </div>

        <select name="categories[]" multiple class="form-control">
            @foreach($categories as $category)
            <option value="{{$category->id}}" @if($attachedCategories->contains($category->id)) selected @endif>{{$category->name}}</option>
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
