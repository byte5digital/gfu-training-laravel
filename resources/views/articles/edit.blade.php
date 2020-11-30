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

            <h1>Update Article</h1>

            <form method="POST" action="{{route('articles.update',$article->id)}}">
                <div class="form-group">
                <!-- Cross-Site-Request-Forgery -->
                @csrf
                <!-- Browser only able to do GET and POST, using method to tell Laravel we want a PUT request-->
                    @method('PUT')

                    <div class="field">
                        <label class="label" for="title">Title</label>

                        <div class="control">
                            <input
                                class="form-control @error('title') is-invalid @enderror"
                                {{-- if error exists, extend class with is-invalid --}}
                                type="text"
                                name="title"
                                id="title"
                                value="{{old('title', $article->title)}}">
                            <!-- old is provided by laravel, inserts former data if rest of the form sent empty -->

                            {{-- Include view errors.excerpt --}}
                            @include('errors.title')
                        </div>
                    </div>
                    <br/>
                    <div class="field">
                        <label class="label" for="excerpt">Excerpt</label>
                        <div class="control">

                            <textarea
                                {{-- if error exists, extend class with is-invalid --}}
                                class="form-control @error('excerpt') is-invalid @enderror"
                                name="excerpt"
                                id="excerpt">{{old('excerpt', $article->excerpt)}}</textarea>
                            <!-- old is provided by laravel, inserts former data if rest of the form sent empty -->

                            {{-- Include view errors.excerpt --}}
                            @include('errors.excerpt')
                        </div>
                    </div>
                    <br/>
                    <div class="field">
                        <label class="label" for="body">Body</label>
                        <div class="control">
                            <textarea
                                {{-- if error exists, extend class with is-invalid --}}
                                class="form-control @error('body') is-invalid @enderror"
                                id="body"
                                name="body"
                                rows="5">{{old('body', $article->body)}}</textarea>
                            <!-- old is provided by laravel, inserts former data if rest of the form sent empty -->

                            {{-- Include view errors.excerpt --}}
                            @include('errors.body')
                        </div>
                    </div>

                    <br/>
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
