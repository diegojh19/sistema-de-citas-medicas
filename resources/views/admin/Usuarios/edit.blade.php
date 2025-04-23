@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Modificar Usuario: {{$usuario->name}}</h1>
    </div>
    <hr>

    <div class="row">

        <div class="col-md-6">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Complete los datos</h3>
                <div class="card-tools">
                    
                </div>
            </div>

            <div class="card-body">
                <form action="{{url('admin/usuarios',$usuario->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Nombre del Usuario</label> <b>*</b>
                            <input type="text" name="name" value="{{$usuario->name}}" class="form-control" required>
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
                            <input type="email" name="email" value="{{$usuario->email}}" class="form-control" required>
                            @error('email')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Password</label> 
                            <input type="password" name="password" value="{{old('password')}}" class="form-control">
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
                            <label for="">Password verificación</label>
                            <input type="password" name="password_confirmation"  class="form-control">
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
                            <a href="{{url('admin/usuarios')}}" class="btn btn-secondary"> <i class="bi bi-x-circle"></i> Cancelar</a>
                            <button type="submit" class="btn btn-success"> <i class="fas fa-save"></i> Modificar </button>
                        </div>

                    </div>

                </div>
                </form>


                
            </div>
        </div>

        </div>

    </div>

@endsection