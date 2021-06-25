@extends('layouts.app')

@section('scripts')
    <script>
        Livewire.on('articleStored', function() {
            $("#createArticleModal").modal('hide');
        });
    </script>
@stop

@section('content')
<div class="container">
    @if (session('status'))
        <p>{{session('status')}}</p>
    @endif

    @foreach($categories as $category)
        <a class="badge badge-secondary">{{$category->name}}</a>
    @endforeach
    <h1>Blog Articles Overview</h1>

    <a class="btn btn-primary" role="button" data-toggle="modal" data-target="#createArticleModal">New Article</a>

    <br/>
    <br/>

    <livewire:article-list />

    <livewire:create-article :categories="$categories">
</div>
@endsection
