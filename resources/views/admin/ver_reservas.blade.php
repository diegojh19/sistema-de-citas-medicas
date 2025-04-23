@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de Reservas</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Reservas Registrados</h3>
                    
                </div>

                <div class="card-body">
            

                <table id="example1"class="table table-striped table-bordered table-hover table-sm">
                    <thead style="background-color: #c0c0c0">
                        <tr>
                        <td style="text-align: center"> <b>Nro</td>
                        <td style="text-align: center"> <b>Doctor</td>
                        <td style="text-align: center"> <b>Especialidad</td>
                        <td style="text-align: center"> <b>Fecha Reserva</td>
                        <td style="text-align: center"> <b>Hora reserva</td>
                        <td style="text-align: center"> <b>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador =1; ?>
                        @foreach($eventos as $evento)
                            <tr>
                                <td style="text-align: center">{{$contador++}}</td>
                                <td style="text-align: center">{{$evento->doctor->nombres." ".$evento->doctor->apellidos}}</td>
                                <td style="text-align: center">{{$evento->doctor->especialidad}}</td>
                                <td style="text-align: center">{{\Carbon\Carbon::parse($evento->start)->format('Y-m-d')}}</td>
                                <td style="text-align: center">{{\Carbon\Carbon::parse($evento->enf)->format('H:i')}}</td>
                                


                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        
                                        <form action="{{url('/admin/eventos/destroy',$evento->id)}}"
                                             id="formulario{{$evento->id}}" onclick="preguntar{{$evento->id}} (event)" method="post">
                                            @csrf
                                            @method('DELETE')
                                             <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>
                                        <script>
                                            function preguntar{{$evento->id}}(event){
                                                event.preventDefault();
                                                Swal.fire({
                                                title: "¿Esta seguro de eliminar este registro de reserva?",
                                                text: "si elimar este registro, otro usuario podra reservar en este mismo horario",
                                                icon: 'question',
                                                showDenyButton: true,
                                                showCancelButton: false,
                                                confirmButtonText: "Eliminar",
                                                denyButtonText: `Cancelar`
                                                }).then((result) => {
                                                /* Read more about isConfirmed, isDenied below */
                                                if (result.isConfirmed) {
                                                    var form = $('#formulario{{$evento->id}}');
                                                    form.submit();
                                                } else if (result.isDenied) {
                                                    Swal.fire("Los cambios no se guardan", "", "info");
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

                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Reservas",

                                    "infoEmpty": "Mostrando 0 a 0 de 0 Reservas",

                                    "infoFiltered": "(Filtrado de _MAX_ total Reservas)",

                                    "infoPostFix": "",

                                    "thousands": ",",

                                    "lengthMenu": "Mostrar _MENU_ Reservas",

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