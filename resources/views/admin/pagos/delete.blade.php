@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Pago del paciente {{$pago->paciente->apellidos." ".$pago->paciente->nombres}}</h1>
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
                   
                        <form action="{{url('admin/pagos', $pago->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Paciente</label> 
                                    <p>{{$pago->paciente->apellidos." ".$pago->paciente->nombres}}</p>
                                </div>
                            </div>  

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Doctores</label> 
                                    <p>{{$pago->doctor->apellidos." ".$pago->doctor->nombres}}</p>
                                </div>
                            </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Fecha de pago</label> 
                                <p>{{$pago->fecha_pago}}</p>                            
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Monto</label> 
                                <p>{{$pago->monto}}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Descripción</label> 
                                <p>{{$pago->descripcion}}</p>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/pagos')}}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
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
