<p class="of">Оформлено:</p>
            <div class="wrapper" id="getOrder">
                @foreach ($ord as $item)
                    <div class="order">
                        <div class="order_title">
                                <img src="{{asset('img/products/'.$item->image)}}" class="order_img" alt="" srcset="">
                        </div>
                        <div class="order-info">
                            <a href="{{route('product', $item->product_id)}}" class="order_name">
                                {{$item->name}}
                            </a>
                            <p class="order_price" title="Цена">
                                {{$item->price}} ₽
                            </p>
                            <p class="date" title="Дата оформления">
                                {{$item->created_at->format('d.m.Y')}}
                            </p>

                        </div>
                    </div>
                @endforeach

            </div>
