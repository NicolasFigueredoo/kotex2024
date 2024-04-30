<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo mensaje de presupuesto</title>
</head>
<body>
    <p>¡Hola!</p>
    <p>Cotizacion de presupuesto para {{ $nombre }} {{ $apellido }}</p>
    <p> <strong>Email: </strong>{{ $email }} <strong>Celular: </strong>{{ $celular }}</p>
    <p> <strong>Mensaje: </strong> {{ $mensaje }}</p>

    <h1>Tabla de productos</h1>
    <table>
        <thead>
            <tr style="background-color:rgba(51, 68, 127, 1); color: white">
                <th>Categoria</th>
                <th>Nombre</th>
                <th>Color</th>
                <th>Medida</th>
                <th>UnidVenta</th>
                <th>Cantidad</th>

            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto['categoria'] }}</td>
                <td>{{ $producto['nombre'] }}</td>
                <td>{{ $producto['color'] }}</td>
                <td>{{ $producto['medida'] }}</td>
                <td>{{ $producto['unidadVenta'] }}</td>
                <td>{{ $producto['cantidad'] }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>


<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
body{
  font-size: 15px;
  color: black;
  font-family: "Montserrat", sans-serif;
  font-weight: 400;
}
</style>
</html>
