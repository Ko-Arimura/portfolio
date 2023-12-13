<x-app-layout>

    <div class="own_posts">
        @foreach($own_posts as $post)
        <div class="h1">
            <h1　class="h1">{{ $post->user->name }}さんの投稿一覧</h1>
        </div>
        @break
         @endforeach
        @foreach($own_posts as $post)
        <article class="article">

                <div class='post'>
                        <div class="productreview"><a href="/categories/{{ $post->product->category->id }}">カテゴリー&emsp;{{ $post->product->category->name }}</a>
                        <div><p class='price'>価格&emsp;{{ $post->price }} 円</p></div>
                        <div class="flex">
                        <div><p class='product'>商品&emsp;{{ $post->product->name }}</p></div>&nbsp;
                        <div><p class='flavor'>{{ $post->product->flavor }}</p></div>
                        </div>
                        <div><p class'review'>⭐&nbsp;{{ $post->review}}</p></div>
                    </div>
                    <div class="productreview"><h2 class='text'>{{ $post->text }}</h2></div>
                    <div class="right">
                        @if($post->is_liked_by_auth_user())
                        <a href="{{ route('post.unlike', ['id' => $post->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                        @else
                        <a href="{{ route('post.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
                        @endif
                    </div>
                    @if($post->image_url)
                    <div>
                        <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                    </div>
                    @endif
                    
                </div>

            @endforeach
        </div>
   
        <div class='paginate'>
            {{ $own_posts->links() }}
        </div>
        
    </div>
    </article>
   </x-app-layout>
