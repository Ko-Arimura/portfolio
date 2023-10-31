    <body>
        <h1>proteinlife</h1>
        <div class='sales'>
            @foreach ($sales as $sale)
                <div class='sale'>
                    <h2 class='title'>{{ $sale->title }}</h2>
                    <p class='body'>{{ $sale->body }}</p>
                </div>
            @endforeach
        </div>
    </body>