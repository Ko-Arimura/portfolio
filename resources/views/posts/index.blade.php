<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
                @endauth
            </div>
            @endif
        <h1>protein life</h1>

        <div class='posts'>
            <a href='/posts/create'>create</a>
            @foreach ($posts as $post)
                <div class='post'>
                    @if($post->image_url)
                    <div>
                        <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                    </div>
                    @endif
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