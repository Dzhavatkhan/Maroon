<div class="form-container sign-up-container">
    <form action="{{route('signUpApi')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>Создать аккаунт </h1>
        <input type="text" name="reg_name" placeholder="Имя"  />
            @error('reg_name')
            <p class="reg_error">{{$message}}</p>
            @enderror
            <div class="input-file-row">
                <label class="input-file">
                    <input type="file" name="reg_avatar" multiple>
                    <span>Выберите аватар</span>
                </label>
            </div>
            @error('reg_avatar')
            <p class="reg_error">{{$message}}</p>
            @enderror

        <input type="text" name="reg_login" placeholder="Логин" />
            @error('reg_login')
            <p class="reg_error">{{$message}}</p>
            @enderror
        <input type="password" name="reg_password" placeholder="Пароль" />
            @error('reg_password')
            <p class="reg_error">{{$message}}</p>
            @enderror
        <button type="submit">Зарегистрироваться</button>
    </form>
</div>