@foreach ($admins as $a)
@if ($a->login == "mega_brain")
<tr>
    <td>{{$a->id}}</td>
    <td>{{$a->admin_name}}</td>
    <td>{{$a->login}}</td>
</tr>
@else
<tr>
    <td>{{$a->id}}</td>
    <td>{{$a->admin_name}}</td>
    <td>{{$a->login}}</td>

        <td><button class="btn btn-danger" onclick="deleteAdmin({{$a->id}})">Delete</button></td>

</tr>
@endif

@endforeach
<tr>

        <td>
            <button class="btn btn-primary" id="#addAdmin">Добавить админа</button>
        </td>

</tr>
