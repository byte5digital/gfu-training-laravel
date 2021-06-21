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

@if (session('status'))
<p>{{session('status')}}</p>
    
@endif

       <h1>Blog Articles Overview</h1>
       <a class="btn btn-primary" href="{{ route('article.create')}}" role="button">New Article</a>
       <ol>
       @foreach ($articles as $article)
           <li>
           
           <h3><a href="{{route('article.show', $article->id)}}">{{$article->title}} - {{$article->created_at->diffForHumans()}}</a></h3>
           <p>{{$article->excerpt}}</p>
           
       <a class="btn btn-primary" href="{{ route('article.edit', $article->id)}}" role="button">Edit</a>
           </li>
       @endforeach
       </ol>
    </body>
</html>
