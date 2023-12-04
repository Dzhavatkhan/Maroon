<p>Оформлено:</p>
            <div class="wrapper" id="getOrder">
                @foreach ($ord as $item)
                    <div class="order">
                        <div class="order_title">
                            <img src="{{asset('img/products/'.$item->image)}}" class="order_img" alt="" srcset="">

                            <a href="{{route('product', $item->product_id)}}" class="order_name">
                                {{$item->name}}
                            </a>
                        </div>
                        <div class="order-info">
                            <p class="order_price">
                                {{$item->price}}
                            </p>
                            <p class="date">
                                {{$item->created_at->format('d.m.Y')}}
                            </p>

                        </div>
                    </div>
                @endforeach

            </div>
