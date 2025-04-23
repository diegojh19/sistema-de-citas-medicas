@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1> Doctor: {{$doctor->nombres." ".$doctor->apellidos}}</h1>
    </div>
    <hr>

    <div class="row">

        <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Datos Registrados</h3>
                <div class="card-tools">
                    
                </div>
            </div>

            <div class="card-body">
                <form action="{{url('admin/doctores/create')}}" method="POST">
                   
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Nombres</label> 
                            <p>{{$doctor->nombres}}</p>
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Apellidos</label> 
                            <p>{{$doctor->apellidos}}</p>

                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Teléfono</label> 
                            <p>{{$doctor->telefono}}</p>

                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Licencia Medica</label> 
                            <p>{{$doctor->licencia_medica}}</p>

                        </div>

                    </div>

                    
               
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Especialidad</label> 
                            <p>{{$doctor->especialidad}}</p>

                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Email</label> 
                            <p>{{$doctor->user->email}}</p>

                        </div>

                    </div>
 
                </div>

                
                <br>
                

                <br>

                
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <a href="{{url('admin/doctores')}}" class="btn btn-secondary"><i class="bi bi-arrow-bar-left"></i> Volver</a>
                        </div>

                    </div>

                </div>
                </form>


                
            </div>
        </div>

        </div>

    </div>

@endsection