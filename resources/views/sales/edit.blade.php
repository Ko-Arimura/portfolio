<x-app-layout>
    <x-slot name="header">ProteinLife</x-slot>
    <article class=article>
        <form action="/sales" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>セール情報編集</h3>
            <div class="product_id->flavor">
                <h2>フレーバー</h2>
                <input type="text" name="sale[flavor]" value="{{ $sale->product->flavor }}"/>
            </div>
            <div class="product_id->name">
                <h2>商品名</h2>
                <input type="text" name="sale[name]" value="{{ $sale->product->name }}"/>
            </div>
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="sale[title]" value="{{ $sale->title }}"/>
            </div>
            <div class="body">
                <h2>商品価格</h2>
                <input type="text" name="sale[price]" value="{{ $sale->price }}"/>
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
        <form action="/sales/{{ $sale->id }}" id="form_{{ $sale->id }}" method="sale">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deletePost({{ $sale->id }})">削除</button> 
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        </article>
        <script>
        function deletePost(id) {
            'use strict'
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
                
            }
            
        }
        </script>
        
</x-app-layout>