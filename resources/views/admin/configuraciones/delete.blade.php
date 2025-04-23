@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Eliminar Configuracion</h1>
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
                <form action="{{url('admin/configuraciones',$configuracion->id)}}" method="POST">
                    @csrf
                    @method('DELETE')  

                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Nombre de la clinica/hospital</label> 
                                        <p>{{$configuracion->nombre}}</p>
                                        
                                    </div>
            
                                </div>

                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Dirección</label> 
                                        <p>{{$configuracion->direccion}}</p>
                                       
                                    </div>
            
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Teléfono</label> 
                                        <p>{{$configuracion->telefono}}</p>
                                        
                                    </div>
            
                                </div>

                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Correo</label> 
                                        <p>{{$configuracion->correo}}</p>
                                        @error('correo')
                                        <small class="text-danger" style="color::red">{{$message}}</small>
                                        @enderror
                                    </div>
            
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Logotipo</label>
                                <br>
                                <center>
                                    <output id="list">
                                        <img src="{{asset('storage/'.$configuracion->logo)}}" alt="logo" width="100px">
                                    </output>
                                </center>
                                
                            </div>
                        </div>
                    </div>

                
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <a href="{{url('admin/configuraciones')}}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar </button>
                        </div>

                    </div>

                </div>
                </form>


                
            </div>
        </div>

        </div>

    </div>

@endsection