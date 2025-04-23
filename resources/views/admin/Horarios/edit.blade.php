@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Editar Horario</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Complete los datos</h3>
                </div>

                <div class="card-body row">
                    <div class="col-md-3">
                        <form action="{{url('admin/horarios',$horarios->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                           
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Consultorio</label> <b>*</b>
                                        <select name="consultorio_id" id="consultorio_select" class="form-select">
                                            <option value="">Seleccionar consultorio</option>
                                            @foreach ($consultorios as $consultorio)
                                                <option value="{{ $consultorio->id }}"
                                                    {{ $consultorio->id == $horarios->consultorio_id ? 'selected' : '' }}>
                                                    {{ $consultorio->nombre . ' - ' . $consultorio->ubicacion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>

                            {{-- Doctor --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Doctor</label> <b>*</b>
                                        <select name="doctor_id" class="form-select">
                                            @foreach ($doctores as $doctore)
                                                <option value="{{ $doctore->id }}"
                                                    {{ $doctore->id == $horarios->doctor_id ? 'selected' : '' }}>
                                                    {{ $doctore->apellidos . ' ' . $doctore->nombres . ' - ' . $doctore->especialidad }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>

                            {{-- Día --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Día</label> <b>*</b>
                                        <select name="dias" class="form-select">
                                            @foreach(['LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO','DOMINGO'] as $dia)
                                                <option value="{{ $dia }}"
                                                    {{ $dia == $horarios->dias ? 'selected' : '' }}>
                                                    {{ $dia }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>

                            {{-- Hora Inicio --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Hora Inicio</label> <b>*</b>
                                        <input type="time" name="hora_inicio" value="{{ old('hora_inicio', substr($horarios->hora_inicio, 0, 5)) }}" class="form-control" required>
                                        @error('hora_inicio')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Hora Fin --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Hora Final</label> <b>*</b>
                                        <input type="time" name="hora_fin" value="{{ old('hora_fin', substr($horarios->hora_fin, 0, 5)) }}" class="form-control" required>
                                        @error('hora_fin')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <br>

                            {{-- Botones --}}
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ url('admin/horarios') }}" class="btn btn-secondary">
                                            <i class="bi bi-x-circle"></i> Cancelar
                                        </a>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-save"></i> Actualizar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- Info consultorio dinámico (AJAX) --}}
                    <div class="col-md-9">
                        <div id="consultorio_info"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script para AJAX consultorio --}}
    <script>
        $(document).ready(function() {
            // Disparar el AJAX automáticamente si ya hay un consultorio seleccionado
            var consultorio_id = $('#consultorio_select').val();
            if (consultorio_id) {
                cargarDatosConsultorio(consultorio_id);
            }
    
            // También seguir funcionando en cambios manuales
            $('#consultorio_select').on('change', function(){
                var selectedId = $(this).val();
                cargarDatosConsultorio(selectedId);
            });
    
            function cargarDatosConsultorio(consultorio_id) {
                var url = "{{ route('admin.horarios.cargar_datos_consultorio', ':id') }}";
                url = url.replace(':id', consultorio_id);
    
                if(consultorio_id){
                    $.ajax({
                       url: url,
                       type: 'GET',
                       success: function (data) {
                            $('#consultorio_info').html(data);
                       },
                       error: function () {
                            alert('Error al obtener los datos del consultorio');
                       }
                    });
                } else {
                    $('#consultorio_info').html('');
                }
            }
        });
    </script>
    
@endsection
