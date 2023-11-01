@if ($count == 0 || $count == "NULL")
    <div class="empty">
        <p class="empty-title">Ваша корзина пуста.</p>
        <a href="/" class="empty-body">Перейти в каталог</a>
    </div>
@else
@foreach ($products as $product)
    <div class="product-card">
        <div class="product-card-body">
            <img class="product-card-image" src="{{asset('img/products/'.$product->image)}}" alt="{{$product->image}}">
            <h4 class="product-card-name">{{$product->product_name}}</h4>
            <p class="product-card-price">
                {{$product->price}}
            </p>
            <p class="product-card-category">{{$product->category}}</p>
        </div>
        <div class="product-card-footer">
            <button class="minusProduct" onclick="deleteProduct({{$product->id}})" ><img src="{{asset('img/Subtract.png')}}" alt=""></button>
            <div class="operating" id="count">
                <p> {{$product->qu}}</p>
            </div>
            <button class="plusProduct" onclick="addProduct({{$product->id}})"><img src="{{asset('img/Plus Math.png')}}" ></button>
        </div>
    </div>
@endforeach
@endif


   @if ($price_list > 1)
        <div class="price-list">
            <p class="price-word">
                Итого:
            </p>
            <button class="pay-click">Оплатить</button>

            <p class="price-item">

                    {{$price_list}}

                <svg xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 7 9" fill="none">
                    <path d="M1.14259 9V7.28571H0V6.46639H1.14259V5.34454H0V4.38655H1.14259V0H3.61163C4.7586 0 5.60788 0.222689 6.15947 0.668068C6.71982 1.11345 7 1.7605 7 2.60924C7 3.46639 6.69794 4.13866 6.09381 4.62605C5.48968 5.10504 4.601 5.34454 3.42777 5.34454H2.32458V6.46639H4.49156V7.28571H2.32458V9H1.14259ZM2.32458 4.38655H3.25704C4.05378 4.38655 4.67104 4.2605 5.10882 4.0084C5.55535 3.7563 5.77861 3.30252 5.77861 2.64706C5.77861 2.07563 5.59475 1.65126 5.22702 1.37395C4.85929 1.09664 4.2858 0.957984 3.50657 0.957984H2.32458V4.38655Z" fill="#122947"/>
                </svg>
            </p>
        </div>
    @endif
