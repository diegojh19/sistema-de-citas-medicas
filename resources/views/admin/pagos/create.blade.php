@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de un nuevo Pago</h1>
    </div>
    <hr>

    <div class="row">

        <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Complete los datos</h3>
                <div class="card-tools">
                    
                </div>
            </div>

            <div class="card-body">
                <form action="{{url('admin/pagos/create')}}" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form group">
                            <label for="">Paciente</label> <b>*</b>
                            <select name="paciente_id" id="" class="form-select">
                                @foreach ($pacientes as $paciente )
                                    <option value="{{$paciente->id}}"> {{$paciente->apellidos." ".$paciente->nombres}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>  

                    <div class="col-md-6">
                        <div class="form group">
                            <label for="">Doctores</label> <b>*</b>
                            <select name="doctor_id" id="" class="form-select">
                                @foreach ($doctores as $doctore )
                                    <option value="{{$doctore->id}}"> {{$doctore->apellidos." ".$doctore->nombres. " - ".$doctore->especialidad}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    
               
                </div>


                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Fecha pago</label> <b>*</b>
                            <input type="date" name="fecha_pago" value="<?php echo date('Y-m-d')?>" class="form-control" required>
                            
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Monto</label> <b>*</b>
                            <input type="text" name="monto" value="{{old('monto')}}" class="form-control" required>
                            @error('monto')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form group">
                            <label for="">Descripcion</label> <b>*</b>
                            <input type="descripcion" name="descripcion" value="{{old('descripcion')}}" class="form-control" required>
                            @error('descripcion')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                    
                </div>

                
                <br>
                

                <br>

                
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <a href="{{url('admin/pagos')}}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
                            <button type="submit" class="btn btn-success"> <i class="fas fa-save"></i> Guardar </button>
                        </div>

                    </div>

                </div>
                </form>


                
            </div>
        </div>

        </div>

    </div>

@endsection