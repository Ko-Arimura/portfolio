<x-app-layout>
        <div class=sumit>
        <form  action="{{ route ('index') }}" method="GET" class="search-form-006">
            <label>
            <input type="text" name="keyword" value="{{ $keyword }}">
             </label>
            <button type="submit" aria-label="検索">
        </form>
    </div>
 
    <div class="h1">
        <h1　class="h1">種類から探す</h1></h1>
    </div>
    <div class="catelog">
    @foreach($categories as $category)
        <a class='ctg' href="/categories/{{ $category->id }}">{{ $category->name }}</a>
    @endforeach
    </div>
    <div class="sale"><a class="sales" href="/sales">セール情報はこちらから→</a></div>
    <article class=article>
        <div class="h1">
        <h1　class="h1">口コミ</h1>
        </div>
        
        <a class="create" href='/posts/create'>投稿する</a>
        <div class='posts'>
            
            @foreach ($posts as $post)

                <div class='post'>

                    
                    <a class='user' href='/user/{{ $post->user->id}}'>投稿者&emsp;{{ $post->user->name }}</a>
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

　　　　　　　　
　　　　　　　　@if ($user_id == $post->user_id)
　　　　　　　　<div class="edit"><a href="/posts/{{ $post->id }}/edit">編集する</a></div>
　　　　　　　　@endif
            @endforeach
        </div>
        <div class='paginate'>
        {{ $posts -> links()}}
        </div>
        <div class="pagetop">Top</div>
      </article>
      <script>
      const pagetop_btn = document.querySelector(".pagetop");
      pagetop_btn.addEventListener("click", scroll_top);
      function scroll_top() {
          window.scroll({ top: 0, behavior: "smooth" });
      }
      window.addEventListener("scroll", scroll_event);
      function scroll_event() {
          if (window.pageYOffset > 70) {
              pagetop_btn.style.opacity = "1";
              
          } else if (window.pageYOffset < 100) {
              pagetop_btn.style.opacity = "0";
              
          }
          
      }
      </script>
    </x-app-layout>