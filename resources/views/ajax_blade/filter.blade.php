@if ($q > 0)
@foreach ($products as $product)
    <div class="product_card all">
        <a style="text-decoration: none" href="{{ route('product',$product->product_id) }}"><img src="{{ asset('img/products/'.$product->image) }}" alt=""></a>
        <div class="product_card_name_price">
            <a style="text-decoration: none" href="{{ route('product',$product->product_id) }}">
                <p class="product_name">{{ $product->product_name }}</p>
            </a>
            <p class="product_price">{{ $product->price }}</p>
        </div>
        <p class="product_category">{{ $product->category }}</p>


    </div>
@endforeach
@else
    <h2>Результатов: 0</h2>
@endif

