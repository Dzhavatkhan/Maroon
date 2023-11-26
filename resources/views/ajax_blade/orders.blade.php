@foreach ($orders as $order)
    <td>{{ $order->id }}</td>
    <td>{{ $order->name}}</td>
    <td>{{ $order->user_name }}</td>
    <td>{{ $order->order_price }}</td>
    <td>{{ $order->created_at }}</td>
@endforeach
