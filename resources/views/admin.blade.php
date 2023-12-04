<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Admin dashboard</title>
    @vite("resources/css/admin.css")

</head>
<body>
    <div class="container">
        <div class="admin-profile">
            <img src="" alt="">
            <p>{{$admin->admin_name}}</p>
            <a href="{{route('admin-logout')}}">Выйти</a>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row mt-5">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#home">Товары</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu1">Клиенты</a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="tab" class="nav-link" href="#orders">Заказы</a>
                </li>
                @if ($admin->status == "sen")
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#menu2">Админы</a>
                    </li>
                @endif

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane container active" id="home">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Бренд</th>
                            <th>Изображение</th>
                            <th>Описание</th>
                            <th>Категории</th>
                            <th>Кол-во</th>
                            <th>Цена</th>
                          </tr>
                        </thead>
                        <tbody id="getProducts">

                        </tbody>




                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                              <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h4 class="modal-title">Добавить товар</h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                @include('forms.form_for_add')

                              </div>
                            </div>
                          </div>






                    </table>
                </div>

                <div class="tab-pane container fade mt-3" id="menu1">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Логин</th>
                                <th>Дата регистрации</th>
                              </tr>
                        </thead>
                        <tbody id="getUsers">

                            {{-- @foreach ($users as $user)
                                <tr>
                                   <td>{{$user->name}}</td>
                                   <td>{{$user->login}}</td>
                                   <td>{{$user->created_at->format('d.m.Y')}}</td>
                                   <td><button class="btn btn-danger" onclick="deleteUser({{$user->id}})">Удалить</button></td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane container fade" id="menu2">
                    <table class="table">

                        <thead>
                            <tr>
                              <th>ID</th>
                              <th>Имя админа</th>
                              <th>Логин админа</th>
                            </tr>
                          </thead>

                        <tbody id="getAdmins">
                            {{-- @foreach ($admins as $admin)
                                <tr>
                                    <td>{{$admin->admin_name}}</td>
                                    <td>{{$admin->login}}</td>
                                <td><button class="btn btn-danger" onclick="deleteAdmin({{$admin->id}})">Delete</button></td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane container fade" id="orders">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название продукта</th>
                                <th>Имя пользователя</th>
                                <th>Статус</th>
                                <th>Сумма</th>
                                <th>Дата заказа</th>
                              </tr>
                        </thead>
                        <tbody id="getOrders">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function check(){
            console.log('checking...');
        let f_checkbox = document.getElementById('face')
        let b_checkbox = document.getElementById('body')

        let f_surpize = document.getElementById('surp_face');
        let b_surpize = document.getElementById('surp_body');



        if (f_checkbox.checked) {
            f_surpize.classList.remove('sup_face')

            b_surpize.classList.remove('check_plus')
            b_surpize.classList.add('sup_body')

            f_surpize.classList.add('check_plus')
            console.log("face check");
        }
        else if(b_checkbox.checked){
            b_surpize.classList.remove('sup_body')

            f_surpize.classList.remove('check_plus')
            f_surpize.classList.add('sup_face')

            b_surpize.classList.add('check_plus')
            console.log("body check");
        }
        else {
            console.log(0);
        }
        }



        function check_edit(){
            console.log('checking...');
        let f_checkbox = document.getElementById('face_edit')
        let b_checkbox = document.getElementById('body_edit')

        let f_surpize = document.getElementById('surp_face_edit');
        let b_surpize = document.getElementById('surp_body_edit');

        if (f_checkbox.checked) {
            f_surpize.classList.remove('sup_face')

            b_surpize.classList.remove('check_plus')
            b_surpize.classList.add('sup_body')

            f_surpize.classList.add('check_plus')
            console.log("face check_edit");
        }
        else if(b_checkbox.checked){
            b_surpize.classList.remove('sup_body')

            f_surpize.classList.remove('check_plus')
            f_surpize.classList.add('sup_face')

            b_surpize.classList.add('check_plus')
            console.log("body check");
        }
        else {
            console.log(0, );
        }
        }




        $(document).ready(function () {
            getProducts();
            getUsers();
            getAdmins();
            getOrders();
        });

        function addAdmin(){
            $('.form').on('submit', function (e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    type: "method",
                    url: "url",
                    data: "data",
                    dataType: "dataType",
                    success: function (response) {

                    }
                });
            });
          }
            $('.addProduct').on('submit', function (e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "{{route('addProduct')}}",
                    data: formData,
                    processData: false,
                    cache:false,
                    contentType:false,
                    success: function (response) {
                        console.log(response);
                        getProducts();
                    },
                    error: function (error){
                        console.log(error);
                    }
                });
            });

        function getProducts(){
            let products = 'products';
            $.ajax({
                type: "GET",
                url: "{{route('getProducts')}}",
                data: {products: products},
                case:false,
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log('products');
                    $('#getProducts').html(data);
                }
            });
        }
        function getOrders(){
            let orders = 'orders';
            $.ajax({
                type: "GET",
                url: "{{route('getOrders')}}",
                data: {orders: orders},
                case:false,
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log('orders');
                    $('#getOrders').html(data);
                }
            });
        }
        function accept(id){
            $.ajax({
                type: "GET",
                url: "{{route('accept')}}",
                data:{oc:id},
                success: function (response) {
                    console.log(response);
                    getOrders();
                },
                error: function(err){
                    console.error(err);
                }
});
        }
        function cancel(id){
            $.ajax({
                type: "GET",
                url: "{{route('cancel')}}",
                data:{oc:id},
                success: function (response) {
                    console.log(response);
                    getOrders();
                },
                error: function(err){
                    console.error(err);
                }
        });
    }
        function getAdmins(){
            let admins = 'admins';
            $.ajax({
                type: "GET",
                url: "{{route('getAdmins')}}",
                data: {admins: admins},
                case:false,
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log('good');
                    $('#getAdmins').html(data);
                }
            });
        }
        function getUsers(){
            let users = 'users'
            $.ajax({
                type: "GET",
                url: "{{route('getUsers')}}",
                data: {users: users},
                case:false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#getUsers').html(data);
                }
            });
        }
        function deleteProduct(id){
            let conf = confirm("Вы подтверждаете свои действия?");
            if (conf === true) {
                $.ajax({
                type: "GET",
                url: "{{route('delete_product')}}",
                data: {id:id},
                success: function (response) {
                    console.log(response.data);
                    getProducts();
                },
                error: function(error){
                    console.log(error);
                }
            });
            }

        }
        function deleteAdmin (id) {
            let conf = confirm("Вы уверены?")
            if(conf === true){
                $.ajax({
                    type: "GET",
                    url: '{{route("delete_admin")}}',
                    data: {id:id},
                    success: function (response) {
                        console.log(response);
                        getAdmins();
                    },
                    error: function (err){
                        console.log(err);

                    }
                });
            }
          }
          function deleteUser(id){
            let conf = confirm("Вы уверены?")
            if(conf === true){
                $.ajax({
                    type: "GET",
                    data: {id:id},
                    url: '{{route("delete_user")}}',
                    success: function (response) {
                        console.log(response);
                        getUsers();

                    },
                    error: function (err){
                        console.log(err);
                    }
                });
            }
            }
    </script>
</body>
</html>
