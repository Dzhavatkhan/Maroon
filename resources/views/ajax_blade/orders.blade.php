@foreach ($orders as $order)
    @if ($order->status == "В рассмотрении" || $order->status == null)
        <td>{{ $order->id }}</td>
        <td>{{ $order->name}}</td>
        <td>{{ $order->user }}</td>
        <td>В рассмотрении</td>
        <td>{{ $order->price }}</td>
        <td>{{ $order->created_at}}</td>
        <td><button onclick="accept({{ $order->id }})" class="btn btn-success">Принять</button></td>
        <td><button onclick="cancel({{ $order->id }})" class="btn btn-danger">Отменить</button></td>
    @else
        <td>{{ $order->id }}</td>
        <td>{{ $order->name}}</td>
        <td>{{ $order->user }}</td>
        <td>{{ $order->status }}</td>
        <td>{{ $order->price }}</td>
        <td>{{ $order->created_at}}</td>
    @endif

@endforeach
