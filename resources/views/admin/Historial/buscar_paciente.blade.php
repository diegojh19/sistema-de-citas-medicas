@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Busqueda de paciente: </h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Buscar al Paciente</h3>
                </div>

                <div class="card-body">
                    <form action="{{url('admin/historial/buscar_paciente/')}}" method="get">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Carnet de identidad:</label>
                                    <input type="text" name="ci" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div style="height: 32px"></div>
                                    <button type="submit" class="btn btn-primary"> <i class="bi bi-search"></i> Buscar</button>
                                </div>
                            </div>    
                        </div> 
                    </form>    
                    <hr>
                    @if($paciente)
                    <h3>información de paciente</h3>
                    <div class="row">
                        <table>
                            <tr>
                                <td><b>Paciente:</b></td>
                                <td>{{$paciente->apellidos." ".$paciente->nombres}}</td>
                            </tr>
                            
                            <tr>
                                <td><b>Carnet de identidad:</b></td>
                                <td>{{$paciente->ci}}</td>
                            </tr>
                    
                            <tr>
                                <td><b>Numero de seguro:</b></td>
                                <td>{{$paciente->nro_seguro}}</td>
                            </tr>
                    
                            <tr>
                                <td><b>Fecha de nacimiento:</b></td>
                                <td>{{$paciente->fecha_nacimiento}}</td>
                            </tr>
                    
                        </table> 
                    </div>   
                    <a href="{{url('/admin/historial/paciente',$paciente->id)}}" class="btn btn-warning" target="_black">imprimir historial del paciente</a>
                    @else
                        <p>paciente no registrado</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
@endsection

