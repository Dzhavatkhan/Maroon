@if ($q > 0)
@foreach ($products as $pro)
    <div class="product_card all">
        <a style="text-decoration: none" href="{{ route('product',$product->product_id) }}"><img src="{{ asset('img/products/'.$pro->image) }}" alt=""></a>
        <div class="product_card_name_price">
            <a style="text-decoration: none" href="{{ route('product',$product->product_id) }}">
                <p class="product_name">{{ $pro->product_name }}</p> 
            </a>
            <p class="product_price">{{ $pro->price }}</p>  
        </div>
        <p class="product_category">{{ $pro->category }}</p>  


    </div>
@endforeach
@else
    <h2>Результатов: 0</h2>
    <p>body {{ $body_query }}</p>
@endif

