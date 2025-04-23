@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Actualización del consultorio: {{$consultorio->nombre}}</h1>
    </div>
    <hr>

    <div class="row">

        <div class="col-md-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">llene los datos</h3>
                <div class="card-tools">
                    
                </div>
            </div>

            <div class="card-body">
                <form action="{{url('admin/consultorios',$consultorio->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Nombre del consultorio</label> <b>*</b>
                            <input type="text" name="nombre" value="{{$consultorio->nombre}}" class="form-control" required>
                            @error('nombre')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Ubicación</label> <b>*</b>
                            <input type="text" name="ubicacion" value="{{$consultorio->ubicacion}}" class="form-control" required>
                            @error('ubicacion')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Capacidad</label> <b>*</b>
                            <input type="text" name="capacidad" value="{{$consultorio->capacidad}}" class="form-control" required>
                            @error('capacidad')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Teléfono</label> 
                            <input type="text" name="telefono" value="{{$consultorio->telefono}}" class="form-control" >
                        </div>

                    </div>

                    
               
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form group">
                            <label for="">Especialidad</label> <b>*</b>
                            <input type="text" name="especialidad" value="{{$consultorio->especialidad}}" class="form-control" required>
                            @error('especialidad')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Estado</label> <b>*</b>
                            <select name="estado" id="" class="form-control">
                                @if($consultorio->estado == 'ACTIVO')  
                                    <option value="ACTIVO">ACTIVO</option>
                                    <option value="INACTIVO">INACTIVO</option>
                                @else
                                    <option value="INACTIVO">INACTIVO</option>
                                    <option value="ACTIVO">ACTIVO</option>
                                @endif
                            </select>
                        </div>

                    </div>
                </div>
                <br>

                
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <a href="{{url('admin/consultorios')}}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Modificar
                            </button>
                        </div>
                    </div>
                    

                </div>
                </form>


                
            </div>
        </div>

        </div>

    </div>

@endsection