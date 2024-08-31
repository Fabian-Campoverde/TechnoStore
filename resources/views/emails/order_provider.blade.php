<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Pedido para Procesar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        h1, h2, h3 {
            color: #333;
        }
        p, ul {
            color: #555;
        }
        .details {
            margin-bottom: 20px;
        }
        .details strong {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1>Nuevo Pedido Recibido</h1>
    <p>Estimado proveedor,</p>
    <p>Has recibido un nuevo pedido que necesita ser procesado y enviado. A continuación se encuentran los detalles del pedido y la información del cliente:</p>
{{--     
    <h2>Detalles del Pedido #{{ $order['order_number'] }}</h2>
    <div class="details">
        <strong>Fecha del Pedido:</strong> {{ $order['created_at']->format('d M Y, h:i A') }}
        <strong>Total del Pedido:</strong> S/ {{ $order['total'] }}
        <strong>Método de Pago:</strong> {{ $order['paymentMethod']['nombre'] }}
    </div> --}}

    <h2>Productos Solicitados:</h2>
    <ul>
        @foreach ($detalles as $detalle)
            <li>
                <strong>Producto:</strong> {{ $detalle->product->nombre }} <br>
                <strong>Cantidad:</strong> {{ $detalle->quantity }} <br>
                
            </li>
            <hr>
        @endforeach
    </ul>

    <h2>Información del Cliente:</h2>
    <div class="details">
        <ul>
            <li><strong>Nombre:</strong> {{ $order->first_name }} {{ $order->last_name }}</li>
            <li><strong>Teléfono:</strong> {{ $order->phone }}</li>
            <li><strong>Tipo de Documento:</strong> {{ $order->document_type }}</li>
            <li><strong>Número de Documento:</strong> {{ $order->document_number }}</li>
            <li><strong>Dirección:</strong> {{ $order->address }}, {{ $order->zone }}</li>
            <li><strong>Departamento:</strong> {{ $order->department }}</li>
            <li><strong>Provincia:</strong> {{ $order->province }}</li>
            <li><strong>Distrito:</strong> {{ $order->district }}</li>
            <li><strong>Referencia:</strong> {{ $order->reference }}</li>
        </ul>
    </div>

    <p>Por favor, procede con el envío de los productos lo antes posible.</p>
    
    <p>Gracias por tu colaboración.</p>
    
    <p>Atentamente,</p>
    <p>El equipo de TechnoStore Nexus</p>
</body>
</html>
