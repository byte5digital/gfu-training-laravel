@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create new Article</h1>

    <livewire:create-article :categories="$categories" />

</div>
@endsection
