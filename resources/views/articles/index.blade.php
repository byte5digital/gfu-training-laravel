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
                    {{-- If session has status display parapraph with status--}}
                    @if(Session::has('status'))
                        <p class="alert alert-success">{{ Session::get('status') }}</p>
                    @endif

                    <h2>Article Overview</h2>
                    {{-- If a user is logged in show create button --}}
                    @if(Auth::check())
                        <a href="{{route('articles.create')}}" class="btn btn-primary">Create article</a>
                        <br/>
                    @endif

                    <br/>

                    {{-- Create card for each article --}}
                    @foreach($articles as $article)

                        <div class="card">
                            {{-- Link to show route of article --}}
                            <div class="card-header"><b><a href="{{route('articles.show', $article->id)}}">
                                        {{-- Get article title --}}
                                        {{$article->title}}
                                    </a> </b>
                                {{-- Get name of author (owner) of article and created at date diffForHumans(Carbon) --}}
                                <small> by {{$article->user->name}} ({{$article->created_at->diffForHumans()}})</small>
                            </div>

                            <div class="card-body">
                                {{-- Get article excerpt --}}
                                {{$article->excerpt}}

                                <div>
                                    <br/>
                                    {{-- For each tag display fake button --}}
                                    @foreach($article->tags as $tag)

                                        <a role="button" class="badge badge-primary"
                                           href="{{route('articles.indexTagged', $tag->id)}}">{{$tag->name}}</a>

                                    @endforeach
                                </div>

                            </div>

                        </div>


                        <br/>
                    @endforeach
                    {{-- Blade partial that displays the pagination result using Bootstrap CSS --}}
                    <div>{{ $articles->links() }}</div>

                </div>


            </div>

            {{-- If articles is empty display paragraph --}}
            @empty($articles)
                <p>No relevant articles yet.</p>
            @endempty


        </div>

    </div>



@endsection
