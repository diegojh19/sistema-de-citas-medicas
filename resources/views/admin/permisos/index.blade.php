@extends('layouts.admin')
@section('content')
    <h1><b>Listado de Permisos</b></h1>
    <hr>
    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Permisos Registrados</h3>
                        <div class="card-tools">
                           <a href="{{url('/admin/permisos/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Registrar Nuevo</a>
                            
                        </div>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th style="text-align: center">Nro</th>
                                <th style="text-align: center">Nombre del Permiso</th>
                                <th style="text-align: center">Acciones</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php $contador =1; ?>
                        @foreach($permisos as $permiso)
                           
                        <tr>
                                <td style="text-align: center">{{$contador++}}</td>
                            
                                <td>{{$permiso->name}}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{url('admin/permisos/'.$permiso->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{url('admin/permisos/'.$permiso->id.'/edit')}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                        <form action="{{url('admin/permisos',$permiso->id)}}" method="post"
                                            onclick="preguntar{{$permiso->id}}(event)" id="miformulario{{$permiso->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <script>
                                            function preguntar{{$permiso->id}}(event){
                                                event.preventDefault();
                                                Swal.fire({
                                                title: "Desea eliminar este registro?",
                                                text: '',
                                                icon: 'question',
                                                showDenyButton: true,
                                                confirmButtonText: "Eliminar",
                                                confirmButtonColor: '#270a0a',
                                                denyButtonText: 'Cancelar',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        var form = $('#miformulario{{$permiso->id}}');
                                                        form.submit();
                                                    }
                                                });
                                            }
                                        </script>
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