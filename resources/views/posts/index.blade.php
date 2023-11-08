<x-app-layout>
    <x-slot name="header">ProteinLife</x-slot>
    <div class="sale"><a href="/sales">セール情報はこちらから</a></div>
        <div class='posts'>
            <a href='/posts/create'>create</a>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href='/user/{{ $post->user->id}}'>{{ $post->user->name }}<a>
                    @if($post->image_url)
                    <div>
                        <img src="{{ $post->image_url }}" alt="画像が読み込めません。" width="400" height="180"/>
                    </div>
                    @endif
                    
                    <h2 class='title'><a href="/posts/{{ $post->id }}">{{ $post->id }}</a></h2>
                    <h2>感想</h2>
                    <h2 class='text'>{{ $post->text }}</h2>
                    <h2>購入価格</h2>
                    <p class='price'>{{ $post->price }}</p>
                    <h2>商品名</h2>
                    <p class='product'>{{ $post->product->name }}</p>
                    <h2>フレーバー</h2>
                    <p class='flavor'>{{ $post->product->flavor }}</p>
                    <h2>カテゴリー</h2>
                    <a href="/categories/{{ $post->product->category->id }}">{{ $post->product->category->name }}</a>
                    <div class="edit"><a href="/posts/{{ $post->id }}/edit">編集</a></div>
                </div>
                <div>
　　　　　　　　  @if($post->is_liked_by_auth_user())
　　　　　　　　    <a href="{{ route('post.unlike', ['id' => $post->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
　　　　　　　　  @else
　　　　　　　　    <a href="{{ route('post.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
　　　　　　　　  @endif
　　　　　　　　</div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>

    </x-app-layout>