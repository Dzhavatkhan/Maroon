 <!-- The Modal -->
 <div id="myModal" class="modal">

    <!-- Modal content -->
      <div class="modal_container">
          <form id="edit_form" enctype="multipart/form-data" method="GET" action="{{route('update_user')}}">
              @csrf
              @method('PUT')
              <span class="close">&times;</span>
              <ul>
                  <li>
                      <label for="name">Имя</label>
                      <input type="text" id="name" name="name" value="{{Auth::user()->name}}">
                  </li>
                  <li>
                      <label for="name">Логин</label>
                      <label for=""></label>
                      <input type="text" id="name"  value="{{Auth::user()->login}}" name="login">
                  </li>
                  <li>
                      <label for="name">Аватар</label>
                      <div class="input-file-row">
                          <label class="file-label">
                              <input type="file" name="avatar" multiple>
                              <span>Выберите аватар</span>
                              @error('avatar')
                              <p>{{$message}}</p>
                              @enderror
                          </label>
                      </div>
                  </li>
                  <li>
                      <label for="name">Пароль</label>
                      <input type="password"   id="password-input" name="password">
                      <a href="#"  class="password-control" onclick="return show_hide_password(this);"><img class="password_hide" id="password_img" src="{{asset('img/password_hide.svg')}}" alt="" srcset=""></a>
                  </li>
                  <li>
                      <label for="name">Подтверждение пароля</label>
                      <input type="password" id="password-conf-input" name="password_conf">
                      <a href="#"  class="password-control" onclick="return show_hide_password_conf(this);"><img class="password_hide" id="password_img_conf" src="{{asset('img/password_hide.svg')}}" alt="" srcset=""></a>
                  </li>

                  <li>
                      <input type="submit">
                  </li>
              </ul>
          </form>
      </div>
 </div>
