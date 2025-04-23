@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1> Consultorio: {{$consultorio->nombre}} </h1>
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
                <form action="{{url('admin/consultorios/create')}}" method="POST">
                   
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Nombre del consultorio</label> 
                            <p>{{$consultorio->nombre}}</p>
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Ubicación</label> 
                            <p>{{$consultorio->ubicacion}}</p>

                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Capacidad</label> 
                            <p>{{$consultorio->capacidad}}</p>

                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Teléfono</label> 
                            <p>{{$consultorio->telefono}}</p>
                        </div>

                    </div>

                    
               
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form group">
                            <label for="">Especialidad</label> 
                            <p>{{$consultorio->especialidad}}</p>

                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Estado</label> 
                            <p>{{$consultorio->estado}}</p>

                        </div>

                    </div>
                </div>
                <br>

                
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <a href="{{url('admin/consultorios')}}" class="btn btn-secondary"><i class="bi bi-arrow-bar-left"></i> Volver</a>
                        </div>

                    </div>

                </div>
                </form>


                
            </div>
        </div>

        </div>

    </div>

@endsection