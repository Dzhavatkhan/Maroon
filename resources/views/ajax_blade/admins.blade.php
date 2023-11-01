@foreach ($admins as $admin)
    <tr>
        <td>{{$admin->id}}</td>
        <td>{{$admin->admin_name}}</td>
        <td>{{$admin->login}}</td>
        <td><button class="btn btn-danger" onclick="deleteAdmin({{$admin->id}})">Delete</button></td>
    </tr>
@endforeach
<tr>
    <td>
        <button class="btn btn-primary" id="#addAdmin">Добавить админа</button>
    </td>
</tr>
