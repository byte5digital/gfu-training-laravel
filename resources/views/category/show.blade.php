<?php
/**
 * @var \App\Category $category
 */
?>


@extends('layouts.app')

@section('content')
<div class="container">
<h1>Kategorie - {{$category->name}}</h1>

<form action="{{route('category.destroy',$category->id)}}" method="post">

     @csrf <!-- Cross-Site-Request-Forgery -->
      @method('delete')
   <button type="submit" class="btn btn-danger">Delete</button>
</form>
</div>
@endsection
