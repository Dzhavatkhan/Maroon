<div class="form-container sign-in-container">
    <form action="{{route('login')}}" method="POST">
        @csrf
        <h1>Войти</h1>

        <span>или используйте свой аккаунт</span>
        <input type="text" name="login" placeholder="Логин" value="{{old('name')}}" />
            @error('login')
            <p class="signIn_login_error">{{$message}}</p>
            @enderror
        <input type="password" name="password" placeholder="Пароль"/>
            @error('password')
            <p class="signIn_passowrd_error">{{$message}}</p>
            @enderror
        <a href="#">Забыли пароль?</a>
        <button type="submit">Войти</button>
    </form>
</div>