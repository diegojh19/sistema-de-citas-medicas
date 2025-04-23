@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1> Doctor: {{$doctor->nombres." ".$doctor->apellidos}}</h1>
    </div>
    <hr>

    <div class="row">

        <div class="col-md-12">
        <div class="card cardS card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
                <div class="card-tools">
                    
                </div>
            </div>

            <div class="card-body">
                <form action="{{url('admin/doctores',$doctor->id)}}" method="POST">
                    @csrf
                    @method('DELETE')                     
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Nombres</label> 
                            <p>{{$doctor->nombres}}</p>
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Apellidos</label> 
                            <p>{{$doctor->apellidos}}</p>

                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Teléfono</label> 
                            <p>{{$doctor->telefono}}</p>

                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Licencia Medica</label> 
                            <p>{{$doctor->licencia_medica}}</p>

                        </div>

                    </div>

                    
               
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Especialidad</label> 
                            <p>{{$doctor->especialidad}}</p>

                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Email</label> 
                            <p>{{$doctor->user->email}}</p>

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
                            <button type="submit" class="btn btn-danger"> <i class="bi bi-trash"></i> Eliminar </button>

                        </div>

                    </div>

                </div>
                </form>


                
            </div>
        </div>

        </div>

    </div>

@endsection