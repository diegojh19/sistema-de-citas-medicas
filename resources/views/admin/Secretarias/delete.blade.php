@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Borrar Secretaria: {{$secretaria->nombres}} {{$secretaria->apellidos}}</h1>
    </div>
    <hr>

    <div class="row">

        <div class="col-md-12">
        <div class="card card card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
                <div class="card-tools">
                    
                </div>
            </div>

            <div class="card-body">
                <form action="{{url('admin/secretarias',$secretaria->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Nombres</label> 
                                <p>{{$secretaria->nombres}}</p>

                            </div>
    
                        </div>
    
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Apellidos</label>
                                <p>{{$secretaria->apellidos}}</p>

                            </div>
    
                        </div>
    
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">CI</label> 
                                <p>{{$secretaria->ci}}</p>

                            </div>
    
                        </div>
    
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Celular</label> 
                                <p>{{$secretaria->celular}}</p>
                            </div>
    
                        </div>
    
                        
                   
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Fecha de nacimiento</label> 
                                <p>{{$secretaria->fecha_nacimiento}}</p>
                                @error('fecha_nacimiento')
                                <small class="text-danger" style="color::red">{{$message}}</small>
                                @enderror
                            </div>
    
                        </div>
    
                        <div class="col-md-9">
                            <div class="form group">
                                <label for="">Dirección</label> 
                                <p>{{$secretaria->direccion}}</p>
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
                                <label for="">Email</label> 
                                <p>{{$secretaria->user->email}}</p>
                                @error('email')
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
                                <a href="{{url('admin/secretarias')}}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar registro </button>
                            </div>
    
                        </div>
    
                    </div>
                    </form>


                
            </div>
        </div>

        </div>

    </div>

@endsection