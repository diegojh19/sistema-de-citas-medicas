@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de una nueva secretaria</h1>
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
                <form action="{{url('admin/secretarias/create')}}" method="POST">
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
                            <label for="">Celular</label> <b>*</b>
                            <input type="text" name="celular" value="{{old('celular')}}" class="form-control" required>
                            @error('celular')
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

                    <div class="col-md-9">
                        <div class="form group">
                            <label for="">Dirección</label> <b>*</b>
                            <input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" required>
                            @error('direccion')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                </div>
                <br>
                <div class="row">

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Email</label> <b>*</b>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control" required>
                            @error('email')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Password</label> <b>*</b>
                            <input type="password" name="password" value="{{old('password')}}" class="form-control" required>
                            @error('password')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Password verificación</label> <b>*</b>
                            <input type="password" name="password_confirmation"  class="form-control" required>
                            @error('password')
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
                            <a href="{{url('admin/secretarias')}}" class="btn btn-secondary"> <i class="bi bi-x-circle"></i> Cancelar</a>
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