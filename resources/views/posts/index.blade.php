<x-app-layout>
    <x-slot name="header">ProteinLife</x-slot>
        <div class='posts'>
            <a href='/posts/create'>create</a>
            @foreach ($posts as $post)
                <div class='post'>
                    <small>{{ $post->user->name }}</small>
                    @if($post->image_url)
                    <div>
                        <img src="{{ $post->image_url }}" alt="画像が読み込めません。" width="400" height="180"/>
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
    </x-app-layout>