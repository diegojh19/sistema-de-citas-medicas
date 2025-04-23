@extends('layouts.admin')
@section('content')
    <h1><b>Editar rol</b></h1>
    <hr>

<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Complete los campos</h3>
                    
            </div>

            <div class="card-body">
                <form action="{{url('admin/roles',$roles->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nombre del Rol</label>
                                <input type="text" name="name" value="{{$roles->name}}" class="form-control" required>
                                @error('name')
                                    <small class="text-danger" style="color::red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{url('admin/roles')}}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Modificar </button>
                            </div>
    
                        </div>
    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection