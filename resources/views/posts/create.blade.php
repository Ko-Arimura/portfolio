<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>proteinlife</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="price">
                <h2>購入価格</h2>
                <input type="text" name="post[price]" placeholder="商品の購入価格"/>
            </div>
            <div class="text">
                <h2>感想</h2>
                <textarea name="post[text]" placeholder="商品の感想を記入してください"></textarea>
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

            </div>
            <input type="submit" value="投稿"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>