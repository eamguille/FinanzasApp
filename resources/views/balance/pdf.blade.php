<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        h2 {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h2>Resumen de Balance</h2>

    <div style="display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 20px;">
        <div>
            <p><strong>Usuario:</strong> {{ $usuario->name }}</p>
            <p><strong>Correo:</strong> {{ $usuario->email }}</p>
        </div>
        <div style="text-align: right;">
            <p><strong>Fecha:</strong> {{ $fecha }}</p>
        </div>
    </div>

    <p><strong>Total Entradas:</strong> ${{ number_format($totalEntradas, 2) }}</p>
    <p><strong>Total Salidas:</strong> ${{ number_format($totalSalidas, 2) }}</p>
    <p><strong>Balance:</strong> ${{ number_format($balance, 2) }}</p>

    <h3>Entradas</h3>
    <table>
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Monto</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entradas as $entrada)
            <tr>
                <td>{{ $entrada->tipo }}</td>
                <td>${{ number_format($entrada->monto, 2) }}</td>
                <td>{{ $entrada->fecha }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Salidas</h3>
    <table>
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Monto</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salidas as $salida)
            <tr>
                <td>{{ $salida->tipo }}</td>
                <td>${{ number_format($salida->monto, 2) }}</td>
                <td>{{ $salida->fecha }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>