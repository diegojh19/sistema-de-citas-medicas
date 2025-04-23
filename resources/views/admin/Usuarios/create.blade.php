@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de un nuevo usuario</h1>
    </div>
    <hr>

    <div class="row">

        <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Complete los datos</h3>
                <div class="card-tools">
                    
                </div>
            </div>

            <div class="card-body">
                <form action="{{url('admin/usuarios/create')}}" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Nombre del Usuario</label> <b>*</b>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" required>
                            @error('name')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Email</label> <b>*</b>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control" required>
                            @error('email')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Password</label> <b>*</b>
                            <input type="password" name="password" value="{{old('password')}}" class="form-control" required>
                            @error('password')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Password verificación</label> <b>*</b>
                            <input type="password" name="password_confirmation"  class="form-control" required>
                            @error('password')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <a href="{{url('admin/usuarios')}}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
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