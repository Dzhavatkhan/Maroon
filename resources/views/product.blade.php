<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @vite('resources/css/product.css')
    @vite('resources/css/slider.css')
    <title>{{$product->product_name}}</title>
    @auth
        <input type="hidden" id="auth" value="1">
    @endauth
    @guest
    <input type="hidden" id="auth" value="0">
    @endguest

</head>
<body>
    @include('forms.header')
    <main>
        <section class="product_section">
            <div class="product-card">
                <div class="product-image">
                    <img src="{{asset('img/products/'.$product->image)}}" alt="{{$product->product_name}}">
                </div>
                <div class="product-card-info">
                    <div class="product-card-info-wrapper">
                        <h2 class="product-card-name">{{$product->product_name}}</h2>
                        <p class="product-card-category">{{$product->category}}</p>
                        <p class="product-card-description">{{$product->description}}</p>
                        <p class="product-card-price">{{$product->price}} ₽</p>
                        <button class="addCart" onclick="addCart({{$product->id}})">Добавить в корзину</button>
                    </div>
                </div>
            </div>

        </section>
        @include('forms.may_like')
    </main>
        @include('forms.footer')
    <script>
        function addCart(id){
            $.ajax({
                type: "GET",
                url: "{{route('addCart')}}",
                data: {id:id},
                success: function (response) {
                    console.log(response);
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Товар добавлен в вашу корзину!',
                    showConfirmButton: false,
                    timer: 1500
                    })
                },
                error: function (response){
                    let auth = document.getElementById('auth').value;
                    if (auth == 1) {
                        Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: 'Возникла ошибка',
                    })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ошибка',
                            text: 'Вы не авторизованы',
                            footer: '<a href="{{route('signIn')}}">Войти</a>'
                        })
                    }

                    console.log(response);
                }
            });

        }


    </script>
    @vite('resources/js/slider.js')
</body>
</html>
