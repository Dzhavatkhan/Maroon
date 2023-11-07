<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Каталог</title>
    @vite('resources/css/catalog.css')
</head>
<body>
    @include('forms.header')
    <main>
        <section class="catalog_box">
            <div class="catalog_box_title">
                <h2>Каталог</h2>
                <button>Фильтр</button>
            </div>
            <div class="catalog_box_cards">
                @foreach ($products as $product)
                    <h2>{{$product->category}}</h2>
                @endforeach
            </div>
        </section>
        <section class="other_info">

        </section>
        <section></section>
        <section></section>

    </main>
    @include('forms.footer')
</body>
</html>
