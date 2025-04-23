@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de Secretarias</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Secretarias Registradas</h3>
                    <div class="card-tools">
                        <a href="{{url('admin/secretarias/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Registrar nuevo
                        </a>

                    </div>
                </div>

                <div class="card-body">
            

                <table id="example1"class="table table-striped table-bordered table-hover table-sm">
                    <thead style="background-color: #c0c0c0">
                        <tr>
                        <td style="text-align: center"> <b>Nro</td>
                        <td style="text-align: center"> <b>Nombres</td>
                        <td style="text-align: center"> <b>Apellidos</td>
                        <td style="text-align: center"> <b>Ci</td>
                        <td style="text-align: center"> <b>Celular</td>
                        <td style="text-align: center"> <b>Fecha de nacimiento</td>
                        <td style="text-align: center"> <b>Dirección</td>
                        <td style="text-align: center"> <b>Email</td>

                        <td style="text-align: center"> <b>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador =1; ?>
                        @foreach($secretarias as $secretaria)
                            <tr>
                                <td style="text-align: center">{{$contador++}}</td>
                                <td>{{$secretaria->nombres}}</td>
                                <td>{{$secretaria->apellidos}}</td>
                                <td>{{$secretaria->ci}}</td>
                                <td>{{$secretaria->celular}}</td>
                                <td>{{$secretaria->fecha_nacimiento}}</td>
                                <td>{{$secretaria->direccion}}</td>
                                <td>{{$secretaria->user->email}}</td>


                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{url('admin/secretarias/'.$secretaria->id)}}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                        <a href="{{url('admin/secretarias/'.$secretaria->id.'/edit')}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                        <a href="{{url('admin/secretarias/'.$secretaria->id.'/confirm-delete')}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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

                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Secretarias",

                                    "infoEmpty": "Mostrando 0 a 0 de 0 Secretarias",

                                    "infoFiltered": "(Filtrado de _MAX_ total Secretarias)",

                                    "infoPostFix": "",

                                    "thousands": ",",

                                    "lengthMenu": "Mostrar _MENU_ Secretarias",

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