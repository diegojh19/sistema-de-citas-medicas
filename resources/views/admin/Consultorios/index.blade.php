@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de Consultorios</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Consultorios Registrados</h3>
                    <div class="card-tools">
                        <a href="{{url('admin/consultorios/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Registrar nuevo
                        </a>

                    </div>
                </div>

                <div class="card-body">
            

                <table id="example1"class="table table-striped table-bordered table-hover table-sm">
                    <thead style="background-color: #c0c0c0">
                        <tr>
                        <td style="text-align: center"> <b>Nro</td>
                        <td style="text-align: center"> <b>Consultorio</td>
                        <td style="text-align: center"> <b>Ubicación</td>
                        <td style="text-align: center"> <b>Capacidad</td>
                        <td style="text-align: center"> <b>Teléfono</td>
                        <td style="text-align: center"> <b>Especialidad</td>
                        <td style="text-align: center"> <b>Estado</td>
                        <td style="text-align: center"> <b>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador =1; ?>
                        @foreach($consultorios as $consultorio)
                            <tr>
                                <td style="text-align: center">{{$contador++}}</td>
                                <td>{{$consultorio->nombre}}</td>
                                <td>{{$consultorio->ubicacion}}</td>
                                <td>{{$consultorio->capacidad}}</td>
                                <td>{{$consultorio->telefono}}</td>
                                <td>{{$consultorio->especialidad}}</td>
                                <td>{{$consultorio->estado}}</td>


                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{url('admin/consultorios/'.$consultorio->id)}}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                        <a href="{{url('admin/consultorios/'.$consultorio->id.'/edit')}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                        <a href="{{url('admin/consultorios/'.$consultorio->id.'/confirm-delete')}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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

                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Consultorios",

                                    "infoEmpty": "Mostrando 0 a 0 de 0 Consultorios",

                                    "infoFiltered": "(Filtrado de _MAX_ total Consultorios)",

                                    "infoPostFix": "",

                                    "thousands": ",",

                                    "lengthMenu": "Mostrar _MENU_ Consultorios",

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