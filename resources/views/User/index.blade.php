<x-app-layout>
    <x-slot name="header">ProteinLife</x-slot>

    <div class="own_posts">
        @foreach($own_posts as $post)
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
   
        <div class='paginate'>
            {{ $own_posts->links() }}
        </div>
    </div>
   </x-app-layout>
