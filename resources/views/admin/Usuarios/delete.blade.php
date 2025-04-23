@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Usuario: {{$usuario->name}}</h1>
    </div>
    <hr>

    <div class="row">

        <div class="col-md-6">
        <div class="card card card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
                <div class="card-tools">
                    
                </div>
            </div>

            <div class="card-body">
                <form action="{{url('admin/usuarios',$usuario->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Nombre del Usuario</label> 
                            <p>{{$usuario->name}}</p>

                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Email</label> 
                            <p>{{$usuario->email}}</p>

                        </div>

                    </div>

                </div>

                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <a href="{{url('admin/usuarios')}}" class="btn btn-secondary"> <i class="bi bi-x-circle"></i> Cancelar</a>
                            <button type="submit" class="btn btn-danger"> <i class="bi bi-trash"></i> Eliminar Usuario </button>
                        </div>

                    </div>

                </div>
                </form>


                
            </div>
        </div>

        </div>

    </div>

@endsection