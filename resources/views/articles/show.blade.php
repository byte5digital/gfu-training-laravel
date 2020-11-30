{{--PHP Commentary block to use Laravel IDE-Helper --}}
<?php /**
 * @var \App\Article $article
 */ ?>

<!-- Extends app.blade.php in layouts -->
@extends('layouts.app')

{{-- Start of section 'content' --}}
@section('content')

    <div id="wrapper">
        <div id="page" class="container">

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{-- Get title of article --}}
                            <b> {{$article->title}}</b>

                            {{-- Get name of author (owner) of article --}}
                            by {{$article->user->name}}
                        </div>

                        <div class="card-body">
                            {{-- If Session has status display div with status --}}
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{-- Get body of article - unescaped! --}}
                            {!! $article->body !!}


                            <div>
                                <br/>
                                {{-- Display fake button (link) for each tag this article has --}}
                                @foreach($article->tags as $tag)

                                    <a role="button" class="badge badge-primary"
                                       href="{{route('articles.indexTagged', $tag->id)}}">{{$tag->name}}</a>

                                @endforeach
                            </div>
                        </div>


                    </div>


                    <br/>

                    {{-- If User is logged in and logged in user is also the author of the article then enable button to edit this article--}}
                    @if(Auth::check() && ($article->user_id == Auth::id()))
                        <form action="{{route('articles.edit',$article->id)}}" method="get">

                            @csrf <!-- Cross-Site-Request-Forgery -->
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    @endif

                    <br/>
                    {{-- If User is logged in and logged in user is also the author of the article then enable button to delete this article --}}
                    @if(Auth::check() && ($article->user_id == Auth::id()))
                        <form action="{{route('articles.destroy',$article->id)}}" method="post">

                            @csrf <!-- Cross-Site-Request-Forgery -->
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif


                </div>


            </div>

        </div>
    </div>

@endsection
