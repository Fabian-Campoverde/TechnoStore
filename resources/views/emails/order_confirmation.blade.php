<!DOCTYPE html>
<html>
<head>
    <title>Confirmación de Pedido</title>
</head>
<body>
    <h1>¡Gracias por tu pedido!</h1>
    <p>Tu pedido ha sido registrado con éxito. Aquí están los detalles:</p>
    
    <h2>Pedido #{{ $order['order_number'] }}</h2>
    <p>Fecha: {{ $order['created_at']->format('d M Y, h:i A') }}</p>
    <p>Total: S/ {{ $order['total'] }}</p>

    <h3>Detalles del Pedido:</h3>
    <ul>
        @foreach ($detalles['items'] as $detalle)
            <li>{{ $detalle['name'] }} - {{ $detalle['quantity'] }} x S/ {{ $detalle['price'] }}</li>
        @endforeach
    </ul>

    <p>¡Gracias por comprar con nosotros!</p>
</body>
</html>