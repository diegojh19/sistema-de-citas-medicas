@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Registro de un nuevo Historial</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Complete los datos</h3>
                </div>

                <div class="card-body">
                    <form action="{{url('admin/historial/create')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Paciente</label> <b>*</b>
                                            <select name="paciente_id" id="" class="form-control">
                                                @foreach ($pacientes as $paciente)
                                                    <option value="{{$paciente->id}}">{{$paciente->apellidos." - ".$paciente->nombres}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Fecha de la cita médica</label> <b>*</b>
                                            <input type="date" id="fecha_visita" name="fecha_visita" value="<?php echo date('Y-m-d');?>" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Descripción</label><b>*</b>
                                            <textarea name="detalle" class="form-control" id="editor" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/historial')}}" class="btn btn-secondary">
                                        <i class="bi bi-x-circle"></i> Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i> Guardar
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Incluir CKEditor 5 al final de la página -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<!-- Inicializar CKEditor usando window.onload -->
<script>
    window.onload = function() {
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error('Error al inicializar CKEditor:', error);
            });
    };
</script>
