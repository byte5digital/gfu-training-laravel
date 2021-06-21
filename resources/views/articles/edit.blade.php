<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
       <h1>Update Article</h1>
       <form method="POST" action="{{ route('article.update', $article->id)}}">
     @csrf
    @method('PUT')
  <div class="form-group row">
    <label for="title" class="col-4 col-form-label">Title</label> 
    <div class="col-8">
      <input id="title" name="title" type="text" class="form-control" value="{{old('title', $article->title)}}">
      @error('title')
      <p>{{$errors->first('title')}}</p>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="excerpt" class="col-4 col-form-label">Excerpt</label> 
    <div class="col-8">
      <textarea id="excerpt" name="excerpt" cols="40" rows="5" class="form-control">{{old('excerpt', $article->excerpt)}}</textarea>
        @error('excerpt')
      <p>{{$errors->first('excerpt')}}</p>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Text</label> 
    <div class="col-8">
      <textarea id="text" name="text" cols="40" rows="5" class="form-control">{{old('text', $article->text)}}</textarea>
         @error('text')
      <p>{{$errors->first('text')}}</p>
      @enderror
    </div>
  </div> 

  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
    </body>
</html>
