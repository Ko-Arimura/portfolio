<x-app-layout>
    <x-slot name="header">ProteinLife</x-slot>
        <form action="/sales" method="POST" enctype="multipart/form-data">
            @csrf
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
</x-app-layout>