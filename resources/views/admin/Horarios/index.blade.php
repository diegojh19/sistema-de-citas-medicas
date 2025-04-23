@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de Horarios</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Horarios Registrados</h3>
                    <div class="card-tools">
                        <a href="{{url('admin/horarios/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Registrar nuevo
                        </a>

                    </div>
                </div>

                <div class="card-body">
            

                <table id="example1"class="table table-striped table-bordered table-hover table-sm">
                    <thead style="background-color: #c0c0c0">
                        <tr>
                        <td style="text-align: center"> <b>Nro</td>
                        <td style="text-align: center"> <b>Doctor</td>
                        <td style="text-align: center"> <b>Especialidad</td>
                        <td style="text-align: center"> <b>Consultorio</td>
                        <td style="text-align: center"> <b>Día de atención</td>
                        <td style="text-align: center"> <b>Hora Inicio</td>
                        <td style="text-align: center"> <b>Hora Fin</td>

                        <td style="text-align: center"> <b>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador =1; ?>
                        @foreach($horarios as $horario)
                            <tr>
                                <td style="text-align: center">{{$contador++}}</td>
                                <td>{{$horario->doctor->nombres." ".$horario->doctor->apellidos}}</td>
                                <td>{{$horario->doctor->especialidad}}</td>
                                <td>{{$horario->consultorio->nombre." Ubicación: ".$horario->consultorio->ubicacion}}</td>
                                <td style="text-align: center">{{$horario->dias}}</td>
                                <td style="text-align: center">{{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }}</td>
                                <td style="text-align: center">{{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }}</td>


                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{url('admin/horarios/'.$horario->id)}}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                        <a href="{{url('admin/horarios/'.$horario->id.'/edit')}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                        <a href="{{url('admin/horarios/'.$horario->id.'/confirm-delete')}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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

                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Horarios",

                                    "infoEmpty": "Mostrando 0 a 0 de 0 Horarios",

                                    "infoFiltered": "(Filtrado de _MAX_ total Horarios)",

                                    "infoPostFix": "",

                                    "thousands": ",",

                                    "lengthMenu": "Mostrar _MENU_ Horarios",

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
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="card-title">Calendario de atención de doctores</h3>
                        </div>
                        <div class="col-md-4">
                            <div style="float: right">
                                <label for="">Consultorios</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select name="consultorio_id" id="consultorio_select" class="form-select">
                                <option value="" >seleccionar consultorio</option>

                                @foreach ($consultorios as $consultorio)
                                    <option value="{{$consultorio->id}}">{{$consultorio->nombre." - ".$consultorio->ubicacion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            
                <div class="card-body">
                    
                    <script>
                        $('#consultorio_select').on('change', function(){
                            var consultorio_id = $('#consultorio_select').val();
                            //alert(consultorio_id);
                            var url = "{{route('admin.horarios.cargar_datos_consultorio',':id')}}";
                            url = url.replace(':id', consultorio_id);

                            if(consultorio_id){
                                $.ajax({
                                   url: url,
                                   type:'GET',
                                   success: function (data) {
                                        $('#consultorio_info').html(data)
                                   },
                                   error: function (){
                                        alert('Error al obtener los datos del consultorio')
                                   }
                                });
                            }else{
                                $('#consultorio_info').html('');
                            }
                        });

                    </script>
                    <div id="consultorio_info">

                    </div>
                    <hr>
                   
                </div>
            </div>         
        </div>
    </div>
@endsection