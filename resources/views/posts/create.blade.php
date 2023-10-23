<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>proteinlife</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="price">
                <h2>購入価格</h2>
                <input type="text" name="post[price]" placeholder="商品の購入価格"/>
                <p class="price_error" style="color:red">{{ $errors->first('post.price') }}</p>
            </div>
            <div class="text">
                <h2>感想</h2>
                <textarea name="post[text]" placeholder="商品の感想を記入してください"></textarea>
                <p class="text_error" style="color:red">{{ $errors->first('post.text') }}</p>
            </div>
             <div class="review">
                <h2>レビュー</h2>
                <select name="post[review]">
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
                <input type="text" name="post[flavor]" placeholder="商品味"/>
            </div>
            <div class="product_id->name">
                <h2>商品名</h2>
                <input type="text" name="post[name]" placeholder="商品名"/>
            </div>
            <input type="submit" value="投稿"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>