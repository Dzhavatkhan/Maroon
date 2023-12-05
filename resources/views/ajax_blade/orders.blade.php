@foreach ($orders as $order)
    @if ($order->status != "Оформлен")
    <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->name}}</td>
        <td>{{ $order->user }}</td>
        <td>{{$order->status}}</td>
        <td>{{ $order->price }}</td>
        <td>{{ $order->created_at->format("d.m.Y")}}</td>
        <td><button onclick="accept({{ $order->id }})" class="btn btn-success">Принять</button></td>
        <td><button onclick="cancel({{ $order->id }})" class="btn btn-danger">Отменить</button></td>
    </tr>
    @else
    <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->name}}</td>
        <td>{{ $order->user }}</td>
        <td>{{ $order->status }}</td>
        <td>{{ $order->price }}</td>
        <td>{{ $order->created_at->format("d.m.Y")}}</td>
    </tr>
    @endif
@endforeach
