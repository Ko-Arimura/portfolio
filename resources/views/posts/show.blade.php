<x-app-layout>
    <x-slot name="header">ProteinLife</x-slot>
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
            <div class="edit"><a href="/posts/{{ $post->id }}/edit">編集</a></div>
            <a href="/">戻る</a>
        </div>
    </x-app-layout>