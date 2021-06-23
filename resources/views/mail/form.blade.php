@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create new Article</h1>
    <form method="POST" action="{{ route('mail.send')}}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-4 col-form-label">Email</label>
            <input id="email" name="email" type="email" class="form-control">
            <div class="col-8">
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
