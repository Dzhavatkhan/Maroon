<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Каталог</title>
    @vite('resources/css/catalog.css')
</head>
<body>
    @include('forms.header')
    <main>
        <section class="catalog_box">
            <div class="catalog_box_title">
                <h2>Каталог</h2>
                <button class="filter_button" id="filter_button">Фильтр</button>
            </div>
            <form class="form">
                @csrf
            <div class="checkbox hidden">
                <div class="face_check">
                    <p class="check_title">Уход для лица</p>
                    @foreach ($category_face as $face)
                        <div class="chack_chack">
                            <label for="category_face" class="checkbox-label">
                                <input type="radio" class="input" value="{{ $face->id }}" name="category_face" id="face">  {{ $face->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="body_check">
                    <p class="check_title">Уход для тела</p>
                    @foreach ($category_body as $body)
                            <div class="chack_chack">
                                <label for="category_body" class="checkbox-label">
                                    <input type="radio" class="input" value="{{ $body->id }}" name="category_body" id="body">  {{ $body->name }}
                                    
                                </label>
                            </div>
   
                    @endforeach
                </div>
                <div class="skin_check">
                    <p class="check_title">Тип кожи</p>
                    @foreach ($type_skin as $skin)
                        <div class="chack_chack">
                            
                            <label for="skin" class="checkbox-label">
                                <input type="radio" class="input" value="{{ $skin->id }}" name="skin" id="skin">  {{ $skin->name }}
                            </label>
                        </div>
                    @endforeach
                   
                    <button class="enter" type="submit">Применить</button>
                    <button class="out" >Сбросить</button>
                </div>
            </div>
            </form>
            <div class="catalog_box_cards" id="cards">
@foreach ($products as $product)
    <div class="product_card all">
        <a href="{{ route('product',$product->product_id) }}"><img src="{{ asset('img/products/'.$product->image) }}" alt=""></a>
        <div class="product_card_name_price">
            <a style="text-decoration: none" href="{{ route('product',$product->product_id) }}">
                <p class="product_name">
                    {{ $product->product_name }}
                </p> 
            </a>
            <p class="product_price">{{ $product->price }}</p>  
        </div>
        <p class="product_category">{{ $product->category }}</p>  


    </div>
@endforeach
            </div>
        </section>
        <section class="join-section">
            <div class="collage-container">
                <img src="{{ asset('img/collage/2293486 1.png') }}" class="collage-item" alt="">
                <img src="{{ asset('img/collage/2693637 1.png') }}" class="collage-item" alt="">
                <img src="{{ asset('img/collage/2693638 2.png') }}" class="collage-item" alt="">
                <img src="{{ asset('img/collage/2693661 1.png') }}" class="collage-item" alt="">
                <img src="{{ asset('img/collage/2993554 1.png') }}" class="collage-item" alt="">
                <img src="{{ asset('img/collage/3397879 1.png') }}" class="collage-item" alt="">
            </div>
            <div class="join-section-text">
                <p class="join-section-text-title">
                    Присоединяйтесь к нам
                </p>
                <p class="join-section-text-body">
                    Подпишитесь на наш аккаунт @marooncare
                    и узнавайте о новиках и акциях первыми
                </p>
                <p class="join-section-text-btn">
                    Подписаться
                </p>
            </div>
        </section>
        <!-- -->
        <!-- -->
        <!-- -->
        <!-- -->
        <!-- -->
        <section class="contact_map">
            <div class="contact-map-text">
                <p class="contact_map_title">
                    Контакты
                </p>
                <div class="contact_map_body">
                    <div class="contact_map_body_address">
                        <p class="contact_map_body_address_title">Адрес</p>
                        <p class="contact_map_body_address_body">Санкт-Петербург, ул. Большая Конюшенная, 19</p>
                    </div>
                    <div class="contact_map_body_phone">
                        <p class="contact_map_body_phone_title">Телефон</p>
                        <p class="contact_map_body_phone_body">+7 (923) 888-90-60</p>
                    </div>
                    <div class="contact_map_body_email">
                        <p class="contact_map_body_email_title">E-mail</p>
                        <p class="contact_map_body_email_body">info@maroon.ru</p>
                    </div>
                </div>
                <div class="contact_map_icons">
                    <img src="{{ asset('img/Vector.svg') }}" alt="">
                    <img src="{{ asset('img/instagram.svg') }}" alt="">
                    <img src="{{ asset('img/twitter.svg') }}" alt="">
                </div>
            </div>
            <img class="contact-map-img" src="{{asset('img/map.png')}}">

        </section>

    </main>
    @include('forms.footer')

    @vite('resources/js/catalog.js')
    <script>

            $('.form').on('submit', function (e) {
            e.preventDefault();
            let cards = document.querySelectorAll('.product_card');
            for (let card = 0; card < cards.length; card++) {
                const element = cards[card];
                element.classList.remove('all');
                element.classList.add('hidden');
            }
            // card.classList.remove('all');
            // card.classList.add('hidden');
            let formData = new FormData(this);
            let face = document.querySelectorAll('#face')
            let body = document.querySelectorAll('#body')
            let skin = document.querySelectorAll('#skin')

            for (let facecheck = 0; facecheck < face.length; facecheck++) {
                const element = face[facecheck];
                if (element.checked == true) {
                    face = element
                    console.log(face);
                }

            }
            for (let b = 0; b < body.length; b++) {
                const element = body[b];
                if (element.checked == true) {
                    body = element
                    console.log(body);
                }

            }
            for (let sk = 0; sk < skin.length; sk++) {
                const element = skin[sk];
                if (element.checked == true) {
                    skin = element
                    console.log(skin);
                }

            }

            console.log(face.value,body.value,skin.value);

            $.ajax({
                type: "GET",
                url: "{{route('filter')}}",
                data: {category_face:face.value,category_body:body.value, skin:skin.value},
                cache:false,
                contentType:false,
                success: function (data, response) {
                        console.log('products');
                        console.log(response);
                        $('#cards').html(data);
                    }
            });
        });            
    </script>
</body>
</html>
