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
    <div class="field">
                        <label class="label" for="body">Category</label>
                        <div class="control">

                            <select
                                name="categories[]"
                                multiple
                                class="form-control"
                            >
                                {{-- For each tag insert an option --}}
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>

                      

                        </div>
</div>
    <button type="submit" class="btn btn-success">Speichern</button>
</form>
</div>
@endsection
