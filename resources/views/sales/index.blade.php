<x-app-layout>
    <x-slot name="header">ProteinLife</x-slot>
        <h1>proteinlife</h1>
        <article class=article>
        <a href='/sales/create'>投稿する</a>
        <div class='sales'>
            @foreach ($sales as $sale)
                <div class='sale'>
                    <h2 class='title'>{{ $sale->title }}</h2>
                    <p class='price'>{{ $sale->proce }}</p>
                </div>
                 <h2>商品名</h2>
                 <p class='product'>{{ $sale->product->name }}</p>
                 <h2>フレーバー</h2>
                <p class='flavor'>{{ $sale->product->flavor }}</p>
                <h2>カテゴリー</h2>
                 <div class="edit"><a href="/sales/{{ $sale->id }}/edit">編集</a></div>
            @endforeach
           
        </div>
        <div class='paginate'>
            {{ $sales->links() }}
        </div>
        <a href="/">ホームへ戻る</a>
        </article>
</x-app-layout>