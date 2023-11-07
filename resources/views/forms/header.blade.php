<header>
    <div class="header_content">
        <nav>
            <a href="{{route('index')}}"><img class="nav_svg" src="{{asset('img/MAROON.svg')}}" alt=""></a>
            <ul class="nav_menu">
                <li><a href="/">Каталог</a></li>
                <li><a href="/">О нас</a></li>
                <li><a href="/">Контакты</a></li>
            </ul>
            <ul class="nav_icons">
                @guest
                    <li> <a href="{{route('signIn')}}"><img src="{{asset('img/login.png')}}" alt=""></a></li>
                @endguest
                @auth
                    <li> <a href="{{route('profile', Auth::user()->id)}}"><img src="{{asset('img/login.png')}}" alt=""></a></li>
                @endauth
                @guest
                    <li><img src="{{asset('img/cart.png')}}" alt=""></li>
                @endguest
                @auth
                    <li class="cart"><img src="{{asset('img/cart.png')}}" alt=""></li>
                @endauth

            </ul>
        </nav>
        <img class="header_lane" src="{{asset('img/lane.svg')}}" alt="">
    </div>

</header>
