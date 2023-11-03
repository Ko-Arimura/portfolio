<x-app-layout>
    <x-slot name="header">ProteinLife</x-slot>
        <h1>proteinlife</h1>
        <a href='/sales/create'>投稿する</a>
        <div class='sales'>
            @foreach ($sales as $sale)
                <div class='sale'>
                    <h2 class='title'>{{ $sale->title }}</h2>
                    <p class='price'>{{ $sale->proce }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $sales->links() }}
        </div>
</x-app-layout>