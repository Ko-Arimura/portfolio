<x-app-layout>
    <x-slot name="header">ProteinLife</x-slot>
        <div class='posts'>
            <a href='/posts/create'>create</a>
            {{--@php 
            dd($posts->posts)
            @endphp--}}
            <h1>{{ $category->name }}</h1>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href='/user/{{ $post->user->id }}'>{{ $post->user->name }}<a>
                    @if($post->image_url)
                    <div>
                        <img src="{{ $post->image_url }}" alt="画像が読み込めません。" width="400" height="180"/>
                    </div>
                    @endif
                    <h2 class='title'><a href="/posts/{{ $post->id }}">{{ $post->id }}</a></h2>
                    
                    <h2 class='text'>{{ $post->text }}</h2>
                    <p class='price'>{{ $post->price }}</p>
                    <p class='product'>{{ $post->product->name }}</p>
                    <p class='flavor'>{{ $post->product->flavor }}</p>
                    <a href="/categories/{{ $post->product->category->id }}">{{ $post->product->category->name }}</a>
                    
                </div>

            @endforeach
        </div>
                    <a href="/">戻る</a>

    </x-app-layout>