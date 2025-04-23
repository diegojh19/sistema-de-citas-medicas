@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de pagos</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">pagos Registrados</h3>
                    <div class="card-tools">
                        <a href="{{url('admin/pagos/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Registrar nuevo
                        </a>

                    </div>
                </div>

                <div class="card-body">
            

                <table id="example1"class="table table-striped table-bordered table-hover table-sm">
                    <thead style="background-color: #c0c0c0">
                        <tr>
                        <td style="text-align: center"> <b>Nro</td>
                        <td style="text-align: center"> <b>Paciente</td>
                        <td style="text-align: center"> <b>Doctor</td>
                        <td style="text-align: center"> <b>Fecha de pago</td>
                        <td style="text-align: center"> <b>Monto</td>
                        <td style="text-align: center"> <b>Descripcion</td>
                        <td style="text-align: center"> <b>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador =1; ?>
                        @foreach($pagos as $pago)
                            <tr>
                                <td style="text-align: center">{{$contador++}}</td>
                                <td style="text-align: center">{{$pago->paciente->apellidos." ".$pago->paciente->nombres}}</td>
                                <td style="text-align: center">{{$pago->doctor->apellidos." ".$pago->doctor->nombres}}</td>
                                <td style="text-align: center">{{$pago->fecha_pago}}</td>
                                <td style="text-align: center">{{$pago->monto}}</td>
                                <td style="text-align: center">{{$pago->descripcion}}</td>
                                
                               


                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{url('admin/pagos/'.$pago->id)}}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                        <a href="{{url('admin/pagos/pdf/'.$pago->id)}}" class="btn btn-warning" target="_black"><i class="bi bi-printer"></i></a>

                                        <a href="{{url('admin/pagos/'.$pago->id.'/edit')}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                        <a href="{{url('admin/pagos/'.$pago->id.'/confirm-delete')}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <hr>
                    <h4>Resumen total del monto de pagos: {{$total_monto}}</h4>

                    <script>

                        $(function () {

                            $("#example1").DataTable({

                                "pageLength": 10,

                                "language": {

                                    "emptyTable": "No hay información",

                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Pagos",

                                    "infoEmpty": "Mostrando 0 a 0 de 0 Pagos",

                                    "infoFiltered": "(Filtrado de _MAX_ total Pagos)",

                                    "infoPostFix": "",

                                    "thousands": ",",

                                    "lengthMenu": "Mostrar _MENU_ Pagos",

                                    "loadingRecords": "Cargando...",

                                    "processing": "Procesando...",

                                    "search": "Buscador:",

                                    "zeroRecords": "Sin resultados encontrados",

                                    "paginate": {

                                        "first": "Primero",

                                        "last": "Ultimo",

                                        "next": "Siguiente",

                                        "previous": "Anterior"

                                    }

                                },

                                "responsive": true, "lengthChange": true, "autoWidth": false,

                                buttons: [{

                                    extend: 'collection',

                                    text: 'Reportes',

                                    orientation: 'landscape',

                                    buttons: [{

                                        text: 'Copiar',

                                        extend: 'copy',

                                    }, {
                                        text:'<button class="btn btn-danger btn-sm btn-block"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</button>',
                                        extend: 'pdf'

                                    },{
                                        text:'<button class="btn btn-info btn-sm btn-block"><i class="bi bi-filetype-csv"></i> CSV</button>',
                                        extend: 'csv'

                                    },{
                                        text:'<button class="btn btn-success btn-sm btn-block"><i class="bi bi-file-earmark-excel-fill"></i> EXCEL</button>',
                                        extend: 'excel'

                                    },{

                                        text:'<button class="btn btn-warning btn-sm btn-block"><i class="bi bi-printer-fill"></i> IMPRIMIR</button>',
                                        extend: 'print'

                                    }

                                    ]

                                },

                                    {

                                        extend: 'colvis',

                                        text: 'Visor de columnas',

                                        collectionLayout: 'fixed three-column'

                                    }

                                ],

                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

                        });

                    </script>

                </div>

            </div>

        </div>
                        
    </div>
@endsection