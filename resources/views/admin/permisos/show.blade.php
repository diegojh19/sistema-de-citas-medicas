@extends('layouts.admin')
@section('content')
    <h1><b>Datos de Permisos</b></h1>
    <hr>
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Datos Registrados</h3>
                    
            </div>

            <div class="card-body">
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nombre del permiso</label>
                                <p>{{$permisos->name}}</p>
                               
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Fecha y hora de creación</label>
                                <p>{{$permisos->created_at}}</p>
                               
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/permisos')}}" class="btn btn-secondary"><i class="bi bi-arrow-bar-left"></i> volver</a>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>
@endsection