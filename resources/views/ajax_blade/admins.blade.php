@foreach ($admins as $a)
    <tr>
        <td>{{$a->id}}</td>
        <td>{{$a->admin_name}}</td>
        <td>{{$a->login}}</td>

            <td><button class="btn btn-danger" onclick="deleteAdmin({{$a->id}})">Delete</button></td>

    </tr>
@endforeach
<tr>

        <td>
            <button class="btn btn-primary" id="#addAdmin">Добавить админа</button>
        </td>

</tr>
