<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>protein life</h1>
        <small>{{ $post->user->name }}</small>
        <div class="content">
            <div class="content__post">
                <h3>感想</h3>
                <p>{{ $post->text }}</p>    
            </div>
        </div>
        @if($post->image_url)
        <div>
            <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
        </div>
        @endif
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>