<x-app-layout>
    <x-slot name="header">ProteinLife</x-slot>
    <article class=article>
        <form action="/sales" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>セール情報作成</h3>
            <div class="product_id->flavor">
                <h2>フレーバー</h2>
                <input type="text" name="sale[flavor]" placeholder="商品味"/>
            </div>
            <div class="product_id->name">
                <h2>商品名</h2>
                <input type="text" name="sale[name]" placeholder="商品名"/>
            </div>
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="sale[title]" placeholder="タイトル"/>
            </div>
            <div class="body">
                <h2>商品価格</h2>
                <input type="text" name="sale[price]" placeholder="商品の購入価格"/>
            </div>
             <div class="image">
                <input type="file" name="image">
            </div>
            <div class="category">
                <h2>Category</h2>
                <select name="sale[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                </div>
                <input type="submit" value="投稿"/>
        </form>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        </article>
</x-app-layout>