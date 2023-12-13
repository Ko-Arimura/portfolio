<x-app-layout>
    <article class="article">
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="h1">
                <h1　class="h1">投稿作成</h1>
            </div>
            <div class="review">
                <div class="contact-heading">
                <label class="contact-label">価格<span class="contact-span">必須</span></label>
                </div>
                <input type="text" name="post[price]" value="{{ $post->price }}" class="contact-textbox"/>
                <p class="price_error" style="color:red">{{ $errors->first('post.price') }}</p>
            </div>
            <div class="review">
                <div class="contact-heading">
                <label class="contact-label">感想<span class="contact-span">必須</span></label>
                </div>
                <textarea name="post[text]"value="{{ $post->text}}">{{ $post->text}}</textarea>
                <p class="text_error" style="color:red">{{ $errors->first('post.text') }}</p>
            </div>
             <div class="review">
                <div class="contact-heading">
                <label class="contact-label">レビュー<span class="contact-span">必須</span></label>
                </div>
                <select name="post[review]" class="review2">
                    <option value="">{{ $post->review}}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <p class="review_error" style="color:red">{{ $errors->first('post.review') }}</p>
            </div>
            <div class="review" class="contact-textbox ">
                <div class="contact-heading">
                <label class="contact-label">写真<span class="contact-span">任意</span></label>
                </div>
                <input type="file" name="image">
            </div>
            <div class="review">
                <div class="contact-heading">
                <label class="contact-label">カテゴリー<span class="contact-span">必須</span></label>
                </div>
            <select name="post[category_id]" class="contact-textbox">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            </div>
            <div class="review">
                <div class="contact-heading">
                <label class="contact-label">フレーバー<span class="contact-span">必須</span></label>
                </div>
                <input type="text" name="post[flavor]" value="{{ $post->product->flavor}}"class="contact-textbox "/>
            </div>
            <div class="review">
                <div class="contact-heading">
                <label class="contact-label">商品名<span class="contact-span">必須</span></label>
                </div>
                <input type="text" name="post[name]" value="{{ $post->product->name}}" class="contact-textbox "/>
            </div>
            <p class="formbottom">
            <input type="submit" value="投稿" class="btns submit"/>
            </p>
        </form>
       
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
    </x-app-layout>