<x-app-layout>
    <x-slot name="header">ProteinLife</x-slot>
        <h1>proteinlife</h1>
        <article class=article>
        <div class='sales'>
            
                <div class='sale'>
                    <h2 class='title'>{{ $sale->title }}</h2>
                    <p class='price'>{{ $sale->price }}</p>
                </div>
                <div>
                    <img src="{{ $sale->image_url }}" alt="画像が読み込めません。"/>
                </div>
        </div>
        <a href="/">戻る</a>
        </article>
</x-app-layout>