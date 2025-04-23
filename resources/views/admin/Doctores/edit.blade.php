@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1> Doctor: {{$doctor->nombres." ".$doctor->apellidos}}</h1>
    </div>
    <hr>

    <div class="row">

        <div class="col-md-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Complete los datos</h3>
                <div class="card-tools">
                    
                </div>
            </div>

            <div class="card-body">
                <form action="{{url('admin/doctores',$doctor->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Nombres</label> 
                            <input type="text" name="nombres" value="{{$doctor->nombres}}" class="form-control" required>
                            @error('nombres')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Apellidos</label> 
                            <input type="text" name="apellidos"  value="{{$doctor->apellidos}}" class="form-control" required>
                            @error('apellidos')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Teléfono</label> 
                            <input type="text" name="telefono"  value="{{$doctor->telefono}}" class="form-control" required>
                            @error('telefono')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Licencia Medica</label> 
                            <input type="text" name="licencia_medica"  value="{{$doctor->licencia_medica}}" class="form-control" required>
                            @error('licencia_medica')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    
               
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Especialidad</label> 
                            <input type="text" name="especialidad"  value="{{$doctor->especialidad}}" class="form-control" required>
                            @error('especialidad')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Email</label> 
                            <input type="email" name="email"  value="{{$doctor->user->email}}" class="form-control" required>
                            @error('email')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Password</label> 
                            <input type="password" name="password" value="{{old('password')}}" class="form-control">
                            @error('password')
                            <small class="text-danger" style="color::red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Password verificación</label> 
                            <input type="password" name="password_confirmation"  class="form-control">
                            @error('password')
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
                            <a href="{{url('admin/doctores')}}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
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