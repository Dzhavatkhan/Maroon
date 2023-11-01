<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/MAROON.svg')}}" type="image/png">
    <title>Maroon</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo&family=Roboto:wght@300&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <header>
        <div class="header_content">
            <nav>
                <img class="nav_svg" src="{{asset('img/MAROON.svg')}}" alt="">
                <ul class="nav_menu">
                    <li><a href="">Каталог</a></li>
                    <li><a href="">О нас</a></li>
                    <li><a href="">Контакты</a></li>
                </ul>
                <ul class="nav_icons">
                    @guest
                        <li> <a href="{{route('signIn')}}"><img src="{{asset('img/login.png')}}" alt=""></a></li>
                    @endguest
                    @auth
                        <li> <a href="{{route('profile', Auth::user()->id)}}"><img src="{{asset('img/login.png')}}" alt=""></a></li>
                    @endauth
                    <li><img src="{{asset('img/cart.png')}}" alt=""></li>
                </ul>
            </nav>
            <div class="header_container">
                <div class="header_product_card">
                    <img src="../../img/Rectangle 5.png" alt="" class="header_product_card_img">
                    <div class="header_product_card_link">
                        <p class="header_product_card_link_text">Уход для лица</p>
                        <img class="header_product_card_link_icon" src="../../img/right.svg" alt="">
                    </div>
                </div>

                <div class="header_slogan">
                    <img class="header_slogan_title" src="../../img/MAROON_slogan.svg">
                    <p class="header_slogan_body">Натуральная косметика для бережного ухода за кожей</p>
                    <button class="header_slogan_btn" onclick="document.location='#app'">Подробнее</button>
                </div>

                <div class="header_product_card2">
                    <img src="{{asset('img/Rectangle 6.png')}}" alt="" class="header_product_card_img">
                    <div class="header_product_card_link">
                        <p class="header_product_card_link_text">Уход для лица</p>
                        <img class="header_product_card_link_icon" src="{{asset('img/right.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>

    </header>
        <!-- -->
        <!-- -->
        <!-- -->
        <!-- -->
        <!-- -->
        <!-- -->
        <!-- -->
    <main>
        <section class="slider_product">
            <div class="slider_product_text_block">
                <h2     class="slider_product_text_block_h2">    Бестселлеры</h2>
                <p      class="slider_product_text_block_p">     Легендарные продукты, <br> завоевавшие любовь наших клиентов</p>
                <button class="slider_product_text_block_button">Смотреть все</button>
            </div>
            <div class="slider_product_carousel">

                      <!-- Slides -->

                    <div class="container">
                        <div class="slider-wrapper">
                          {{-- <button id="prev-slide" class="slide-button material-symbols-rounded">
                            chevron_left
                          </button> --}}
                          <ul class="image-list">
                            @foreach ($products as $product)
                                <div class="swiper-slide">
                                    <a href="{{route('product', $product->id)}}"><img class="slider-img" src="{{asset('img/products/'.$product->image)}}" alt=""></a>
                                </div>
                            @endforeach
                          </ul>
                          {{-- <button id="next-slide" class="slide-button material-symbols-rounded">
                            chevron_right
                          </button> --}}
                        </div>
                        <div class="slider-scrollbar">
                          <div class="scrollbar-track">
                            <div class="scrollbar-thumb"></div>
                          </div>
                        </div>
                      </div>

            </div>
        </section>

        <!-- -->
        <!-- -->
        <!-- -->
        <!-- -->
        <!-- -->
        <!-- -->
        <section class="decorative_section">
            <p class="decorative_section_title">Встречайте весну
                вместе с нами</p>
            <p class="decorative_section_body">Попробуйте новую коллекцию ухаживающих средств для лица с SPF защитой</p>
            <button class="decorative_section_btn">Подробнее</button>
        </section>

        <!-- -->
        <!-- -->
        <!-- -->
        <!-- -->
        <!-- -->
        <!-- -->
        <section class="individ-section">
            <div class="individ-section-decorative-block">
                <p class="title">
                    Индивидуальный уход
                </p>
                <p class="body">
                    Не всегда очевидно, какие элементы и минералы необходимы коже, а многочисленные эксперименты с разными средствами только ухудшают ее качество.
                    <br><br>Заполните анкету, и мы подберем уход, подходящий именно вам, учитывая ваш образ жизни, место жительства и другие факторы.
                </p>
                <button class="send">Заполнить анкету</button>
            </div>
            <img src="{{ asset('img/decorative-img.png') }}" alt="" class="individ-section-img">
        </section>
        <!-- -->
        <!-- -->
        <!-- -->
        <!-- -->
        <!-- -->
        <!-- -->
        <section class="history">
            <p class="history_text">“Мы стремимся сделать уход за кожей доступным
                и приятным ритуалом для всех, кто хочет
                заботиться о себе и своем теле”</p>
            <button class="history_btn">Наша история</button>
        </section>

    <!-- -->
    <!-- -->
    <!-- -->
    <!-- -->
    <!-- -->
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

    <!-- -->
    <!-- -->
    <!-- -->
    <!-- -->
    <!-- -->
    @include('forms.footer')




</body>
</html>
