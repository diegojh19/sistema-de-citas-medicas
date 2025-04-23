@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1> Usuario: {{$usuario->name}}</h1>
    </div>
    <hr>

    <div class="row">

        <div class="col-md-6">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Datos Registrados</h3>
                <div class="card-tools">
                    
                </div>
            </div>

            <div class="card-body">
               
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Nombre del Usuario</label>
                            <p>{{$usuario->name}}</p>
                        </div>

                    </div>

                </div>

                

                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Password</label> 
                            <p>{{$usuario->email}}</p>
                        </div>

                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <a href="{{url('admin/usuarios')}}" class="btn btn-secondary"><i class="bi bi-arrow-bar-left"></i> volver</a>
                        </div>

                    </div>

                </div>
             
            </div>
        </div>

        </div>

    </div>

@endsection