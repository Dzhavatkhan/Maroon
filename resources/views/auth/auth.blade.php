<!DOCTYPE html>
<html lang="ru">
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
        @include('forms.form_reg')

        @include('forms.form_login')
       
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="welcome_back">С возвращением!</h1>
                    <p>Чтобы оставаться на связи с нами, пожалуйста, войдите в систему, указав свои личные данные</p>
                    <button class="ghost" id="signIn">Войти</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Привет!</h1>
                    <p>Введите свои личные данные и начните путешествие вместе с нами</p>
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
