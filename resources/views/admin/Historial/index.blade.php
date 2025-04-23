@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de Historiales Clinico</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Historiales Registrados</h3>
                    <div class="card-tools">
                        <a href="{{url('admin/historial/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>
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
                        <td style="text-align: center"> <b>Fecha de la cita medica</td>
                        <td style="text-align: center"> <b>Detalle</td>
                        <td style="text-align: center"> <b>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador =1; ?>
                        @foreach($historiales as $Historiale)
                           @if ($Historiale->doctor_id == Auth::user()->doctor->id)
                           <tr>
                            <td style="text-align: center">{{$contador++}}</td>
                            <td>{{$Historiale->paciente->apellidos." ".$Historiale->paciente->nombres}}</td>
                            <td style="text-align: center">{{$Historiale->fecha_visita}}</td>
                            <td>
                                {!!\Illuminate\Support\Str::limit($Historiale->detalle, 50, '...')!!}</td>                             

                            <td style="text-align: center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('admin/historial/'.$Historiale->id)}}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                    <a href="{{url('admin/historial/pdf/'.$Historiale->id)}}" type="button" class="btn btn-warning" target="_blank"><i class="bi bi-printer"></i></a>
                                    <a href="{{url('admin/historial/'.$Historiale->id.'/edit')}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                    <a href="{{url('admin/historial/'.$Historiale->id.'/confirm-delete')}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                           @endif
                        @endforeach
                        </tbody>
                    </table>

                    <script>

                        $(function () {

                            $("#example1").DataTable({

                                "pageLength": 10,

                                "language": {

                                    "emptyTable": "No hay información",

                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Historiales",

                                    "infoEmpty": "Mostrando 0 a 0 de 0 Historiales",

                                    "infoFiltered": "(Filtrado de _MAX_ total Historiales)",

                                    "infoPostFix": "",

                                    "thousands": ",",

                                    "lengthMenu": "Mostrar _MENU_ Historiales",

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

                                        extend: 'pdf'

                                    },{

                                        extend: 'csv'

                                    },{

                                        extend: 'excel'

                                    },{

                                        text: 'Imprimir',

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