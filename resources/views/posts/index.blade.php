<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>protein life</h1>
        <div class='posts'>
            <a href='/posts/create'>create</a>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'><a href="/posts/{{ $post->id }}">{{ $post->id }}</a></h2>
                    <h2 class='text'>{{ $post->text }}</h2>
                    <p class='price'>{{ $post->price }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>