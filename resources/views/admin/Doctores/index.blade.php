@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de Doctores</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Doctores Registrados</h3>
                    <div class="card-tools">
                        <a href="{{url('admin/doctores/create')}}" class="btn btn-primary"> <i class="fa fa-plus"></i>
                            Registrar nuevo
                        </a>

                    </div>
                </div>

                <div class="card-body">
            

                <table id="example1"class="table table-striped table-bordered table-hover table-sm">
                    <thead style="background-color: #c0c0c0">
                        <tr>
                        <td style="text-align: center"> <b>Nro</td>
                        <td style="text-align: center"> <b>Nombres y Apellidos</td>
                        <td style="text-align: center"> <b>Teléfono</td>
                        <td style="text-align: center"> <b>Licencia Medica</td>
                        <td style="text-align: center"> <b>Especialidad</td>
                        <td style="text-align: center"> <b>Email</td>
                        <td style="text-align: center"> <b>Acciones</td>
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


                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{url('admin/doctores/'.$doctor->id)}}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                        <a href="{{url('admin/doctores/'.$doctor->id.'/edit')}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                        <a href="{{url('admin/doctores/'.$doctor->id.'/confirm-delete')}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <script>

                        $(function () {

                            $("#example1").DataTable({

                                "pageLength": 10,

                                "language": {

                                    "emptyTable": "No hay información",

                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Doctores",

                                    "infoEmpty": "Mostrando 0 a 0 de 0 Doctores",

                                    "infoFiltered": "(Filtrado de _MAX_ total Doctores)",

                                    "infoPostFix": "",

                                    "thousands": ",",

                                    "lengthMenu": "Mostrar _MENU_ Doctores",

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