                            @foreach ($users as $user)
                                <tr>
                                   <td>{{$user->id}}</td>
                                   <td>{{$user->name}}</td>
                                   <td>{{$user->login}}</td>
                                   <td>{{$user->created_at->format('d.m.Y')}}</td>
                                   <td><button class="btn btn-danger" onclick="deleteUser({{$user->id}})">Удалить</button></td>
                                </tr>
                            @endforeach
