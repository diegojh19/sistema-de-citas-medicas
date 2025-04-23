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
    <h2><u>Listado del personal medico</u></h2>
    <br>
    <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
            <tr style="background-color: #e7e7e7">
                <th>Nro</th>
                <th>Nombres y Apellidos</th>
                <th>Teléfono</th>
                <th>Licencia Médica</th>
                <th>Especialidad</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>
            <?php $contador =1; ?>
            @foreach($doctores as $doctor)
                <tr>
                    <td style="text-align: center">{{$contador++}}</td>
                    <td>{{$doctor->nombre." ".$doctor->apellidos}}</td>
                    <td>{{$doctor->telefono}}</td>
                    <td>{{$doctor->licencia_medica}}</td>
                    <td>{{$doctor->especialidad}}</td>
                    <td>{{$doctor->user->email}}</td> 
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
