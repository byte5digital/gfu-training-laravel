@extends('layouts.app')

@section('content')
<div class="container">
<h1>Update User</h1>

<form method="POST" action="{{route('user.update',$user->id)}}">
                <div class="form-group">
                <!-- Cross-Site-Request-Forgery -->
                @csrf
                <!-- Browser only able to do GET and POST, using method to tell Laravel we want a PUT request-->
                    @method('PUT')

                    <div class="field">
                        <label class="label" for="name">Name</label>

                        <div class="control">
                            <input
                                class="form-control @error('name') is-invalid @enderror"
                                {{-- if error exists, extend class with is-invalid --}}
                                type="name"
                                name="name"
                                id="name"
                                value="{{old('name', $user->name)}}">
                            <!-- old is provided by laravel, inserts former data if rest of the form sent empty -->

                            {{-- Include view errors.excerpt --}}
                            @include('errors.name')
                        </div>
                    </div>
                    <br/>

                    <br/>
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>

</div>
@endsection
