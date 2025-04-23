@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de un nuevo paciente</h1>
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
                <form action="{{url('admin/pacientes/create')}}" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Nombres</label> <b>*</b>
                            <input type="text" name="nombres" value="{{old('nombres')}}" class="form-control" required>
                            @error('nombres')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Apellidos</label> <b>*</b>
                            <input type="text" name="apellidos" value="{{old('apellidos')}}" class="form-control" required>
                            @error('apellidos')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">CI</label> <b>*</b>
                            <input type="text" name="ci" value="{{old('ci')}}" class="form-control" required>
                            @error('ci')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Nro de seguro</label> <b>*</b>
                            <input type="text" name="nro_seguro" value="{{old('nro_seguro')}}" class="form-control" required>
                            @error('nro_seguro')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    
               
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Fecha de nacimiento</label> <b>*</b>
                            <input type="date" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" class="form-control" required>
                            @error('fecha_nacimiento')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Género</label> <b>*</b>
                            <select name="genero" id="" class="form-select">
                                <option value="M">MASCULINO</option>
                                <option value="F">FEMENINO</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Celular</label> <b>*</b>
                            <input type="text" name="celular" value="{{old('celular')}}" class="form-control" required>
                            @error('celular')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Correo</label> <b>*</b>
                            <input type="text" name="correo" value="{{old('correo')}}" class="form-control" required>
                            @error('correo')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                </div>
                <br>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form group">
                            <label for="">Dirección</label> <b>*</b>
                            <input type="direccion" name="direccion" value="{{old('direccion')}}" class="form-control" required>
                            @error('direccion')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Grupo sanguineo</label> <b>*</b>
                            <select name="grupo_sanguineo" id="" class="form-select">
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>

                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Alergias</label> <b>*</b>
                            <input type="text" name="alergias" value="{{old('alergias')}}" class="form-control" required>
                            @error('alergias')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    

                </div>

                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Contacto de emergencia</label> <b>*</b>
                            <input type="text" name="contacto_emergencia" value="{{old('contacto_emergencia')}}" class="form-control" required>
                            @error('contacto_emergencia')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-9">
                        <div class="form group">
                            <label for="">Observaciones</label>
                            <input type="text" name="observaciones" value="{{old('observaciones')}}" class="form-control">
                            @error('observaciones')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                </div>

                <br>

                
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <a href="{{url('admin/pacientes')}}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
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