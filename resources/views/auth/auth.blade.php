<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @vite('resources/css/auth.css')
    <title>Auth</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{route('signUpApi')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <h1>Создать аккаунт </h1>
                <span>or use your email for registration</span>
                <input type="text" name="name" placeholder="Имя"  />
                    @error('name')
                    <p>{{$message}}</p>
                    @enderror
                    <div class="input-file-row">
                        <label class="input-file">
                            <input type="file" name="avatar" multiple>
                            <span>Выберите аватар</span>
                            @error('avatar')
                            <p>{{$message}}</p>
                            @enderror
                        </label>
                    </div>

                <input type="text" name="login" placeholder="Логин" />
                    @error('login')
                    <p>{{$message}}</p>
                    @enderror
                <input type="password" name="password" placeholder="Пароль" />
                    @error('password')
                    <p>{{$message}}</p>
                    @enderror
                <button type="submit">Зарегистрироваться</button>
            </form>
        </div>


        <div class="form-container sign-in-container">
            <form action="{{route('login')}}" method="POST">
                @csrf
                <h1>Войти</h1>

                <span>or use your account</span>
                <input type="text" name="login" placeholder="Логин" value="{{old('name')}}" />
                    @error('login')
                    <p>{{$message}}</p>
                    @enderror
                <input type="password" name="password" placeholder="Пароль"/>
                    @error('password')
                    <p>{{$message}}</p>
                    @enderror
                <a href="#">Forgot your password?</a>
                <button type="submit">Войти</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Войти</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Привет!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Зарегистрироваться</button>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
<script>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});



$('.input-file input[type=file]').on('change', function(){
	let file = this.files[0];
	$(this).next().html(file.name);
});
</script>
