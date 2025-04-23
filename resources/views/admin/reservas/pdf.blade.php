<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Personal Médico</title>

    <style>
        /* Estilos básicos de Bootstrap (copia los más necesarios) */
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }
        .table-bordered {
            border: 1px solid #ddd;
        }
        .table-sm td, .table-sm th {
            padding: .25rem;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <table border="0" style="font-size: 12pt">
        <tr>
            <td style="text-align: center">
                {{$configuracion->nombre}}<br>
                {{$configuracion->direccion}}<br>
                {{$configuracion->telefono}}<br>
                {{$configuracion->correo}}<br>
                
            </td>
            <td width="330px"></td>
            <td>
                <img src="{{ public_path('storage/'.$configuracion->logo) }}" alt="logo" width="100px">
            </td>
        </tr>
    </table>
    <h2><u>Listado de todas las reservas medicas</u></h2>
    <br>
    <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
            <tr style="background-color: #e7e7e7">
                <th>Nro</th>
                <th>Doctor</th>
                <th>Especialista</th>
                <th>Fecha de Reserva</th>
                <th>Hora de Reserva</th>
               
            </tr>
        </thead>

        <tbody>
            <?php $contador =1; ?>
            @foreach($eventos as $evento)
                <tr>
                    <td style="text-align: center">{{$contador++}}</td>
                    <td>{{$evento->doctor->nombres." ".$evento->doctor->apellidos}}</td>
                    <td>{{$evento->doctor->especialidad}}</td>
                    <td style="text-align: center">{{\Carbon\Carbon::parse($evento->start)->format('Y-m-d')}}</td>
                    <td style="text-align: center">{{\Carbon\Carbon::parse($evento->enf)->format('H:i')}}</td>
                                
                     
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
