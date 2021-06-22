@extends('layouts.app')

@section('content')
<div class="container">
       <h1>Create new Category</h1>
       <form method="POST" action="{{ route('category.update', $category->id)}}">
     @csrf
     @method('PUT')

  <div class="form-group row">
    <label for="name" class="col-4 col-form-label">Name</label>
    <div class="col-8">
      <input id="name" name="name" type="text" class="form-control" value="{{old('name', $category->name)}}">
      @error('name')
      <p>{{$errors->first('name')}}</p>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

</div>
@endsection
