{{--PHP Commentary block to use Laravel IDE-Helper --}}
<?php /**
 * @var \App\Tag $tag
 */ ?>

<!-- Extends app.blade.php in layouts -->
@extends('layouts.app')

{{-- Start of section 'content' --}}
@section('content')
    <div id="wrapper">
        <div id="page" class="container">

            <h1>New Article</h1>

            <form method="POST" action="/articles">
                <div class="form-group">
                @csrf <!-- Cross-Site-Request-Forgery -->
                    <div class="field">
                        <label class="label" for="title">Title</label>

                        <div class="control">
                            <input
                                {{-- if error exists, extend class with is-invalid --}}
                                class="form-control @error('title') is-invalid @enderror"
                                type="text"
                                name="title"
                                id="title"
                                value="{{old('title')}}">
                            <!-- old is provided by laravel, inserts former data if rest of the form sent empty -->

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
                            id="excerpt"
                            value="{{old('excerpt')}}"></textarea>
                            <!-- old is provided by laravel, inserts former data if rest of the form sent empty -->


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
                            rows="5"
                            id="body"
                            name="body"
                            value="{{old('body')}}"></textarea>
                            <!-- old is provided by laravel, inserts former data if rest of the form sent empty -->

                            @include('errors.body')

                        </div>
                    </div>
                    <br/>

                    <div class="field">
                        <label class="label" for="body">Tags</label>
                        <div class="control">

                            <select
                                name="tags[]"
                                multiple
                                class="form-control"
                            >
                                {{-- For each tag insert an option --}}
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>

                            <!-- check if error exists if yes, insert paragraph w error -->
                        @error('tags')
                        <!-- $message same as $errors->first('tags') -->
                            <p class="help is-danger">{{$message}}</p>
                            @enderror

                        </div>
                    </div>
                    <br/>
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>

@endsection
