@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Borrar Horario</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Está seguro de eliminar este registro?</h3>
                    <div class="card-tools">
                    </div>
                </div>

                <div class="card-body">
                   
                        <form action="{{url('admin/horarios', $horarios->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Doctores</label> 
                                    <p>{{$horarios->doctor->nombres." ".$horarios->doctor->apellidos." - ".$horarios->doctor->especialidad}}</p>
                                </div>
            
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Consultorio</label> 
                                    <p>{{$horarios->consultorio->nombre." - ".$horarios->consultorio->ubicacion}}</p>
    
                                </div>
        
                            </div>

                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Día</label> 
                                        <p>{{$horarios->dias}}</p>
            
                                    </div>
            
                                </div>
            
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Hora Inicio</label> 
                                        <p>{{ \Carbon\Carbon::parse($horarios->hora_inicio)->format('h:i A') }}</p>
            
                                    </div>
            
                                </div>
            
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Hora Final</label> 
                                        <p>{{ \Carbon\Carbon::parse($horarios->hora_fin)->format('h:i A') }}</p>
            
                                    </div>
            
                                </div>
            
                            </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/horarios')}}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
