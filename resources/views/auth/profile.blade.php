<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>{{Auth::user()->name}}</title>
    @vite('resources/css/profile.css')
    @vite('resources/css/slider.css')
</head>
<body>
    <header>
        <div class="header_content">
            <nav>
                <a href="{{route('index')}}"><img class="nav_svg" src="{{asset('img/MAROON.svg')}}" alt=""></a>
                <ul class="nav_menu">
                    <li> <a href="{{ route('catalog') }}">Каталог</a></li>
                    <li class="tablinks" onclick="openTab(event, 'cart-cart')" id="defaultOpen">Корзина</li>
                    <li class="tablinks" onclick="openTab(event, 'orders')">Заказы</li>
                    <li id="card_btn">{{ Auth::user()->balance }} ₽</li>
                    <li class="user">
                        <img id="myBtn" src="{{ asset('img/profiles/'.Auth::user()->avatar) }}" alt="" title="Нажмите на аватар, чтобы редактировать профиль">
                    </li>
                    <li class="logout"><a href="{{ route('logout') }}" style="color: crimson; text-decoration:none;">Выйти</a></li>
                </ul>
            </nav>
            <img class="header_lane" src="{{asset('img/lane.svg')}}" alt="">
        </div>

    </header>
    <main>
        @include('forms.card_modal')
        @include('forms.edit_modal_form')

        <div id="cart-cart" class="tabcontent">
            <div class="profile-carts" id="p-cs">

            </div>

        </div>
        <div id="orders" class="tabcontent">
            <h2>gfjfds</h2>
        </div>
        @if ($rec_count != 0)
            @include('forms.may_like')
        @endif


    </main>

    @include('forms.footer')






    <div id="snackbar">Добро пожаловать, {{Auth::user()->name}}</div>

    @vite('resources/js/profile.js')
    @vite('resources/js/slider.js')
    <script>
            let product_id = $('#product_id').val();
            $('.pay-click').click(function (e) { 
                e.preventDefault();
                alert("pay")
                $.ajax({
                    type: "POST",
                    url: "{{ route('pay', Auth::user()->id) }}",
                    data: {product_id: product_id},
                    cache:false,
                    contentType:false,

                    success: function (response) {
                        console.log('good');
                    }
                });
            });
 function show_hide_password(target){
        var img = document.getElementById("password_img");
        var input = document.getElementById('password-input');
        if (input.getAttribute('type') == 'password') {
            target.classList.add('view');
            img.src = "{{asset('img/password_show.svg')}}"
            input.setAttribute('type', 'text');
        } else {
            target.classList.remove('view');
            img.src = "{{asset('img/password_hide.svg')}}"
            input.setAttribute('type', 'password');
        }
        return false;
    }
    input_file();
    function input_file() {
        $('.file-label input[type=file]').on('change', function(){
        let file = this.files[0];
        $(this).next().html(file.name);
        });
    }
    function show_hide_password_conf(target){
        var input = document.getElementById('password-conf-input');
        var img = document.getElementById("password_img_conf");
        if (input.getAttribute('type') == 'password') {
            target.classList.add('view');
            img.src = "{{asset('img/password_show.svg')}}"
            input.setAttribute('type', 'text');
        } else {
            target.classList.remove('view');
            img.src = "{{asset('img/password_hide.svg')}}"
            input.setAttribute('type', 'password');
        }
        return false;
    }
    $(document).ready(function () {
        count();
    });
    function count(){
        let count = 'count';
        $.ajax({
            type: "GET",
            url: "{{route('getCart')}}",
            data: {count: count},
            case:false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#p-cs').html(data);

            }
        });
    }
    function addProduct(id){
        $.ajax({
            type: "GET",
            url: "{{route('addCart')}}",
            data: {id: id},
            success: function (response) {
                console.log(response);
                count();
            }
        });
    }
    function deleteProduct(id){
        $.ajax({
            type: "GET",
            url: "{{route('delectCart')}}",
            data: {id: id},
            success: function (response) {
                console.log(response);
                count();
            }
        });
    }
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
            }
            document.getElementById("defaultOpen").click();
    </script>
</body>
</html>
