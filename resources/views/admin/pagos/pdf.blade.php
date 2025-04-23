<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preload" href="https://acrobat.adobe.com/dc-tutorial-dropin/3.35.0_4.91.0/translations-en-US-json-chunk.js" as="script">

    <title>Pago</title>

    <style>
        /* Estilos básicos de Bootstrap (copia los más necesarios) */
        body {
            font-family: Arial, sans-serif;
            font-size: 9pt;
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
    <table border="0" style="font-size: 10pt">
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
    <h2><u>COMPROBANTE DE PAGO - ORIGINAL</u></h2>
    <br>
    <table border="0" >
        <tr>
            <td width="120px"><b>Sr(es)</b></td>
            <td>{{$pago->paciente->apellidos." ".$pago->paciente->nombres}}</td>
            <td width="150px" rowspan="4" ></td>
            <td rowspan="4">
                <div class="div">
                   <img src="data:image/png;base64, {{ $qrCodeBase64 }}" alt="Código QR" width="200px"> 
                </div>
            </td>
            
        </tr>
        <tr>
            <td><b>Fecha:</b></td>
            <td>{{$pago->fecha_pago}}</td>
        </tr>
        <tr>
            <td><b>consultorio:</b></td>
            <td>{{$pago->doctor->especialidad}}</td>
        </tr>

        <tr>
            <td><b>Monto:</b></td>
            <td>{{$pago->monto}}</td>
        </tr>

    </table>
<br>
<br>

    <table border="0">
        <tr>
            <td width="100">
                <p style="text-align: center">
                    ______________________________ <br>
                    <b>Secretaria</b> <br>
                    {{Auth::user()->secretaria->apellidos." ".Auth::user()->secretaria->nombres}}
                </p>
            </td>
            <td width="100"></td>
            <td width="100">
                <p style="text-align: center">
                    ______________________________ <br>
                    <b>Recibi conforme</b> <br>
                </p>
            </td>
        </tr>
    </table>
    
    <p>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>

    <table border="0" style="font-size: 10pt">
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
    <h2><u>COMPROBANTE DE PAGO - COPIA</u></h2>
    <br>
    <table border="0" >
        <tr>
            <td width="120px"><b>Sr(es)</b></td>
            <td>{{$pago->paciente->apellidos." ".$pago->paciente->nombres}}</td>
            <td width="150px" rowspan="4" ></td>
            <td rowspan="4">
                <div class="div">
                   <img src="data:image/png;base64, {{ $qrCodeBase64 }}" alt="Código QR" width="200px"> 
                </div>
            </td>
            
        </tr>
        <tr>
            <td><b>Fecha:</b></td>
            <td>{{$pago->fecha_pago}}</td>
        </tr>
        <tr>
            <td><b>consultorio:</b></td>
            <td>{{$pago->doctor->especialidad}}</td>
        </tr>

        <tr>
            <td><b>Monto:</b></td>
            <td>{{$pago->monto}}</td>
        </tr>

    </table>
<br>
<br>

    <table border="0">
        <tr>
            <td width="100">
                <p style="text-align: center">
                    ______________________________ <br>
                    <b>Secretaria</b> <br>
                    {{ Auth::user()->secretaria->apellidos ?? '' }} {{ Auth::user()->secretaria->nombres ?? '' }}                </p>
            </td>
            <td width="100"></td>
            <td width="100">
                <p style="text-align: center">
                    ______________________________ <br>
                    <b>Recibi conforme</b> <br>
                </p>
            </td>
        </tr>
    </table>
    
</body>
</html>
