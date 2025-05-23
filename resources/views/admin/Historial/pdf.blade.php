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
    <h2><u>Historial clinico</u></h2>
    <br>
    <h3>información de paciente</h3>
    <table>
        <tr>
            <td><b>Paciente:</b></td>
            <td>{{$historial->paciente->apellidos." ".$historial->paciente->nombres}}</td>
        </tr>
        
        <tr>
            <td><b>Carnet de identidad:</b></td>
            <td>{{$historial->paciente->ci}}</td>
        </tr>

        <tr>
            <td><b>Numero de seguro:</b></td>
            <td>{{$historial->paciente->nro_seguro}}</td>
        </tr>

        <tr>
            <td><b>Fecha de nacimiento:</b></td>
            <td>{{$historial->paciente->fecha_nacimiento}}</td>
        </tr>

    </table>

    <hr>
    <h3>Información del Doctor</h3>
    <table>
        <tr>
            <td><b>Doctor:</b></td>
            <td>{{$historial->doctor->apellidos." ".$historial->doctor->nombres}}</td>
        </tr>

        <tr>
            <td><b>Licencia medica:</b></td>
            <td>{{$historial->doctor->licencia_medica}}</td>
        </tr>

        <tr>
            <td><b>Especialidad:</b></td>
            <td>{{$historial->doctor->especialidad}}</td>
        </tr>
    </table>
    <hr>
    <h3>Diagnostico Realizado</h3>
    <table>
        <td><b>Fecha:</b></td>
            <td>{{$historial->fecha_visita}}</td>
        <tr>
            <td><b>Diagnostico</b></td>
            <td>{!!$historial->detalle!!}</td>
        </tr>
    </table>

</body>
</html>
