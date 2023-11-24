<x-app-layout>
    <x-slot name="header">ProteinLife</x-slot>
    <article class=article>
    <div class=sumit>
        <form  action="{{ route ('index') }}" method="GET" class="search-form-006">
            <label>
            <input type="text" name="keyword" value="{{ $keyword }}">
             </label>
            <button type="submit" aria-label="検索">
        </form>
    </div>
    <div class="sale"><a href="/sales">セール情報はこちらから</a></div>
        <div class='posts'>
            <a href='/posts/create'>create</a>
            
            @foreach ($posts as $post)
                <div class='post'>
                    
                    <a href='/user/{{ $post->user->id}}'>投稿者&nbsp;{{ $post->user->name }}<a>
                   
                    <div class='productreview'>
                        <p class='price'>価格&nbsp;{{ $post->price }} 円</p>
                        <div class=flex>
                        <p class='product'>商品&nbsp;{{ $post->product->name }}</p>&nbsp;
                        <p class='flavor'>{{ $post->product->flavor }}</p>
                        </div>
                    <a href="/categories/{{ $post->product->category->id }}">カテゴリー&nbsp;{{ $post->product->category->name }}</a>
                    </div>
                        <h2 class='text'>{{ $post->text }}</h2>
                    
                </div>
                 @if($post->image_url)
                    <div>
                        <img src="{{ $post->image_url }}" alt="画像が読み込めません。" width="400" height="180"/>
                    </div>
                    @endif
                <div>
　　　　　　　　  @if($post->is_liked_by_auth_user())
　　　　　　　　    <a href="{{ route('post.unlike', ['id' => $post->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
　　　　　　　　  @else
　　　　　　　　    <a href="{{ route('post.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
　　　　　　　　  @endif
　　　　　　　　</div>
　　　　　　　　
　　　　　　　　@if ($user_id == $post->user_id)
　　　　　　　　<div class="edit"><a href="/posts/{{ $post->id }}/edit">編集する</a></div>
　　　　　　　　@endif
            @endforeach
        </div>
        <div class='paginate'>
        {{ $posts -> links()}}
        </div>
      </article>
    </x-app-layout>