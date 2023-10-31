<x-app-layout>
    <x-slot name="header">ProteinLife</x-slot>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="price">
                <h2>購入価格</h2>
                <input type="text" name="post[price]" value="{{ $post->price }}"/>
                <p class="price_error" style="color:red">{{ $errors->first('post.price') }}</p>
            </div>
            <div class="text">
                <h2>感想</h2>
                <textarea name="post[text]" value="{{ $post->text}}">{{ $post->text}}</textarea>
                <p class="text_error" style="color:red">{{ $errors->first('post.text') }}</p>
            </div>
             <div class="review">
                <h2>レビュー</h2>
                <select name="post[review]" >
                    <option value="">-選択してください-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <p class="review_error" style="color:red">{{ $errors->first('post.review') }}</p>
            </div>
            <div class="image">
                <input type="file" name="image">
            </div>
            <div class="category">
            <h2>Category</h2>
            <select name="post[category_id]">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            </div>
            <div class="product_id->flavor">
                <h2>フレーバー</h2>
                <input type="text" name="post[flavor]" value="{{ $post->product->flavor }}"/>
            </div>
            <div class="product_id->name">
                <h2>商品名</h2>
                <input type="text" name="post[name]" value="{{ $post->product->name }}"/>
            </div>
            <input type="submit" value="更新"/>
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