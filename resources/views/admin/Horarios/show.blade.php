@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Datos del Horario</h1>
    </div>
    <hr>

    <div class="row">

        <div class="col-md-10">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Datos Registrados</h3>
                <div class="card-tools">
                    
                </div>
            </div>

            <div class="card-body">
                <form action="{{url('admin/horarios/create')}}" method="POST">
                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Doctores</label> 
                                <p>{{$horario->doctor->nombres." ".$horario->doctor->apellidos." - ".$horario->doctor->especialidad}}</p>
                            </div>
        
                        </div>
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Consultorio</label> 
                                <p>{{$horario->consultorio->nombre." - ".$horario->consultorio->ubicacion}}</p>

                            </div>
    
                        </div>
    
                    </div>
                    <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form group">
                            <label for="">Día</label> 
                            <p>{{$horario->dias}}</p>

                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="form group">
                            <label for="">Hora Inicio</label> 
                            <p>{{ \Carbon\Carbon::parse($horario->hora_inicio)->format('h:i A') }}</p>

                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="form group">
                            <label for="">Hora Final</label> 
                            <p>{{ \Carbon\Carbon::parse($horario->hora_fin)->format('h:i A') }}</p>

                        </div>

                    </div>

                </div>
                <br>
                
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <a href="{{url('admin/horarios')}}" class="btn btn-secondary"><i class="bi bi-arrow-bar-left"></i> volver</a>
                        </div>

                    </div>

                </div>
                </form>


                
            </div>
        </div>

        </div>

    </div>

@endsection