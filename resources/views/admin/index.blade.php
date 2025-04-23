@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>
            <b>Bienvenido:</b> {{ Auth::user()->email }} / 
            <b>Rol:</b> {{ Auth::user()->roles->pluck('name')->first() }}
        </h1>
    </div>

    <hr>

    <div class="row">

        @can('admin.usuarios.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $total_usuarios }}</h3>
                    <p>Usuarios</p>
                </div>

                <div class="icon">
                    <i class="ion fas bi bi-file-person"></i>
                </div>
                <a href="{{ url('admin/usuarios') }}" class="small-box-footer">
                    Más información <i class="fas bi bi-file-person"></i>
                </a>
            </div>
        </div> 
        @endcan
        
        @can('admin.secretarias.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $total_secretarias }}</h3>
                    <p>Secretarias</p>
                </div>
        
                <div class="icon">
                    <i class="ion fas bi bi-person-circle"></i>
                </div>
                <a href="{{ url('admin/secretarias') }}" class="small-box-footer">
                    Más información <i class="fasbi bi-person-circle"></i>
                </a>
            </div>
        </div>
        @endcan

        @can('admin.pacientes.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $total_pacientes }}</h3>
                    <p>Pacientes</p>
                </div>
        
                <div class="icon">
                    <i class="ion fas bi bi-person-fill-check"></i>
                </div>
                <a href="{{ url('admin/pacientes') }}" class="small-box-footer">
                    Más información <i class="fas bi bi-person-fill-check"></i>
                </a>
            </div>
        </div>
        @endcan

        @can('admin.consultorios.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $total_consultorio }}</h3>
                    <p>Consultorios</p>
                </div>
        
                <div class="icon">
                    <i class="ion fas bi bi-building-fill-add"></i>
                </div>
                <a href="{{ url('admin/consultarios') }}" class="small-box-footer">
                    Más información <i class="fas bi bi-building-fill-add"></i>
                </a>
            </div>
        </div>
        @endcan

        @can('admin.doctores.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $total_doctor }}</h3>
                    <p>Doctores</p>
                </div>
            
                <div class="icon">
                    <i class="ion fas bi bi-person-lines-fill"></i>
                </div>
                <a href="{{ url('admin/doctores') }}" class="small-box-footer">
                    Más información <i class="fas bi bi-person-lines-fill"></i>
                </a>
            </div>
        </div>
        @endcan

        @can('admin.horarios.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $total_horarios }}</h3>
                    <p>Horarios</p>
                </div>
            
                <div class="icon">
                    <i class="ion fas bi bi-calendar2-week"></i>
                </div>
                <a href="{{ url('admin/horarios') }}" class="small-box-footer">
                    Más información <i class="fas bi bi-calendar2-week"></i>
                </a>
            </div>
        </div>
        @endcan

        @can('admin.horarios.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $total_eventos }}</h3>
                    <p>Reservas</p>
                </div>
            
                <div class="icon">
                    <i class="ion fas bi bi-calendar2-check"></i>
                </div>
                <a href="" class="small-box-footer"><i class="fas bi bi-calendar2-check"></i>
                </a>
            </div>
        </div>
        @endcan

        @can('admin.horarios.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $total_configuracion }}</h3>
                    <p>configuracion</p>
                </div>
            
                <div class="icon">
                    <i class="ion fas bi bi-gear"></i>
                </div>
                <a href="{{url('admin/configuraciones')}}" class="small-box-footer">Mas información <i class="fas bi bi-gear"></i>
                </a>
            </div>
        </div>
        @endcan
    </div>

    @can('cargar_datos_consultorio')

       
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
                                    <option value="">Seleccionar consultorio</option>

                                    @foreach ($consultorios as $consultorio)
                                        <option value="{{ $consultorio->id }}">{{ $consultorio->nombre . " - " . $consultorio->ubicacion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                
                    <div class="card-body">
                        <script>
                            $('#consultorio_select').on('change', function() {
                                var consultorio_id = $('#consultorio_select').val();
                                var url = "{{ route('cargar_datos_consultorio', ':id') }}";
                                url = url.replace(':id', consultorio_id);

                                if (consultorio_id) {
                                    $.ajax({
                                        url: url,
                                        type: 'GET',
                                        success: function(data) {
                                            console.log(data);  

                                            $('#consultorio_info').html(data);
                                        },
                                        error: function() {
                                            alert('Error al obtener los datos del consultorio');
                                        }
                                    });
                                } else {
                                    $('#consultorio_info').html('');
                                }
                            });
                        </script>
                        <div id="consultorio_info"></div>
                        <hr>
                    </div>
                </div>         
            </div>
        


      
            <div class="col-md-12">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="card-title">Calendario de reserva de citas</h3>
                            </div>
                            <div class="col-md-4">
                                <div style="float: right">
                                    <label for="">Doctores</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select name="doctor_id" id="doctor_select" class="form-select">
                                    <option value="">Seleccionar un doctor...</option>
                                    @foreach ($doctores as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->nombres. " " . $doctor->apellidos." - ". $doctor->especialidad }}</option>
                                    @endforeach
                                </select>

                                <script>
                                    $('#doctor_select').on('change', function() {
                                        //recuperar el id
                                        var doctor_id = $('#doctor_select').val();
                                    // alert(doctor_id);

                                    
                                        var calendarEl = document.getElementById('calendar');
                                        var calendar = new FullCalendar.Calendar(calendarEl, {
                                            initialView: 'dayGridMonth',
                                            locale: 'es',
                                            //
                                            events: [],
                                        });
                                        
                                    
            
                                        if (doctor_id) {
                                            $.ajax({
                                                url: "{{url('cargar_reserva_doctores/')}}" + '/' + doctor_id,
                                                type: 'GET',
                                                dataType: 'json',
                                                success: function (data) {
                                                   // $('#doctor_info').html(data);
                                                calendar.addEventSource(data);
                                                },
                                                error: function() {
                                                    alert('Error al obtener los datos del consultorio');
                                                }
                                            });
                                        } else {
                                            $('#doctor_info').html('');
                                        }
                                        calendar.render();
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                   <!-- <div id="doctor_info"></div> -->

                    <div class="card-body">
                    
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-save"></i> Registrar cita médica
                            </button>
                            
                            <a href="{{url('/admin/ver_reservas', Auth::user()->id)}}" class="btn btn-success"> <i class="bi bi-search"></i> Ver las reservas</a>
                            <div class="row">
                            <!-- Modal -->
                            <form action="{{url('/admin/eventos/create')}}" method="post">
                                @csrf
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Reserva de cita medica</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Doctor</label>
                                                    <select name="doctor_id" id="" class="form-select">
                                                        @foreach ($doctores as $doctor )
                                                            <option value="{{$doctor->id}}">{{$doctor->nombres." ".$doctor->apellidos." - ". $doctor->especialidad}}</option>
                                                            
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
        
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">fecha de reserva</label>
                                                    <input type="date" id="fecha_reserva" name="fecha_reserva" value="<?php echo date('Y-m-d');?>" class="form-control">
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function(){
                                                            const fechaReservaInput = document.getElementById('fecha_reserva');

                                                            //Escuchar el evento de cambio en el campo de fecha de reserva
                                                            fechaReservaInput.addEventListener('change', function(){
                                                                let selectedDate = this.value; //obtener la fecha seleccionada

                                                            //obtener la fecha actual en formato ISO (yyyy--mm-dd)
                                                            let today = new Date().toISOString().slice(0, 10);

                                                            //verificar si la fecha seleccionada es anterior a la fecha actual
                                                            if(selectedDate < today){
                                                                //si es asi, establecer la fecha seleccionada en null
                                                                this.value = null;
                                                                alert("no se puede reservar en una fecha pasada.")
                                                            }

                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
        
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">hora de reserva</label>
                                                    <input type="time" name="hora_reserva" id="hora_reserva" class="form-control">
                                                    @error('hora_reserva')
                                                        <small class="text-danger" style="color::red">{{$message}}</small>
                                                    @enderror

                                                    @if( (($message = Session::get('hora_reserva'))) )
                                                        <script>
                                                            document.addEventListener('DOMContentLoaded', function (){
                                                            $('#exampleModal').modal('show');
                                                        });
                                                        </script>
                                                        <small class="text-danger" style="color::red">{{$message}}</small>

                                                    @endif



                                                    <script>

                                                        document.addEventListener('DOMContentLoaded', function (){
                                                            const horaReservaInput = document.getElementById('hora_reserva');

                                                            horaReservaInput.addEventListener('change',function (){
                                                                let seletedTime = this.value; // obtener el valor de la hora seleccionada
                                                                
                                                                //Asegurar que solo se capture la parte de la hora
                                                                if(seletedTime){
                                                                    seletedTime = seletedTime.split(':'); //Dividir la cadena en horas y minutos
                                                                    seletedTime = seletedTime[0]+ ':00'; //Conservar solo la hora, ignorar los minutos
                                                                    this.value = seletedTime; //Establecer la hora modificada en el campo de entrada

                                                                }
                                                                //Verificar si la hora seleccionada esta fuera del rango permitido
                                                                if(seletedTime<'08:00' || seletedTime>'20:00'){
                                                                //si es asi, establecer la fecha seleccionada en null
                                                                    this.value = null;
                                                                    alert('Por favor ingrese un horario entre las 08:00 de la mañana y 20:00 de la noche');

                                                                };

                                                            });

                                                        });

                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Registrar</button>
                                        </div>
                                        </div>
                                    </div>
                            </form>
                            </div>
                    
                            
                        </div>
                            

                        <div id="calendar"></div>
                    </div>
                </div>         
            </div>
        
        
    @endcan

    @if (Auth::check() && Auth::user()->doctor)
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="card-title">Calendario de reservas</h3>
                        </div>

                    </div>
                </div>

                <div class="card-body">
                    <table id="example1"class="table table-striped table-bordered table-hover table-sm">
                        <thead style="background-color: #c0c0c0">
                            <tr>
                            <td style="text-align: center"> <b>Nro</td>
                            <td style="text-align: center"> <b>Usuario</td>
                            <td style="text-align: center"> <b>fecha reserva</td>
                            <td style="text-align: center"> <b>Hora reserva</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador =1; ?>
                            @foreach($eventos as $evento)
                            @if (Auth::user()->doctor->id == $evento->doctor->id)
                                <tr>
                                    <td style="text-align: center">{{$contador++}}</td>
                                    <td>{{$evento->user->name}}</td>
                                    <td style="text-align: center">{{\Carbon\Carbon::parse($evento->start)->format('Y-m-d')}}</td>
                                    <td style="text-align: center">{{\Carbon\Carbon::parse($evento->enf)->format('H:i')}}</td>
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
    @endif
    
    

    
@endsection
