@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de una nueva Configuracion</h1>
    </div>
    <hr>

    <div class="row">

        <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Complete los datos</h3>
                <div class="card-tools">
                    
                </div>
            </div>

            <div class="card-body">
                <form action="{{url('admin/configuraciones/create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Nombre de la clinica/hospital</label> <b>*</b>
                                        <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" required>
                                        @error('nombre')
                                        <small class="text-danger" style="color::red">{{$message}}</small>
                                        @enderror
                                    </div>
            
                                </div>

                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Dirección</label> <b>*</b>
                                        <input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" required>
                                        @error('direccion')
                                        <small class="text-danger" style="color::red">{{$message}}</small>
                                        @enderror
                                    </div>
            
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Teléfono</label> <b>*</b>
                                        <input type="text" name="telefono" value="{{old('telefono')}}" class="form-control" required>
                                        @error('telefono')
                                        <small class="text-danger" style="color::red">{{$message}}</small>
                                        @enderror
                                    </div>
            
                                </div>

                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Correo</label> <b>*</b>
                                        <input type="email" name="correo" value="{{old('correo')}}" class="form-control" required>
                                        @error('correo')
                                        <small class="text-danger" style="color::red">{{$message}}</small>
                                        @enderror
                                    </div>
            
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
    <div class="form-group">
        <label for="file">Logotipo</label>
        <input type="file" id="file" name="logo" class="form-control" accept="image/jpeg, image/png, image/gif">
        <br>
        <center><output id="list"></output></center>
        <script>
            function archivo(evt) {
                var files = evt.target.files;
                var output = document.getElementById("list");
                output.innerHTML = ''; // Limpiar la previsualización anterior

                for (var i = 0, f; f = files[i]; i++) {
                    if (!f.type.match('image.*')) {
                        continue; // Ignorar archivos que no sean imágenes
                    }

                    var reader = new FileReader();
                    reader.onload = (function(theFile) {
                        return function(e) {
                            // Mostrar la previsualización de la imagen
                            output.innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="300" height="200" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
                    reader.readAsDataURL(f);
                }
            }
            document.getElementById('file').addEventListener('change', archivo, false);
        </script>
    </div>
</div>

                    </div>

                
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <a href="{{url('admin/configuraciones')}}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar </button>
                        </div>

                    </div>

                </div>
                </form>


                
            </div>
        </div>

        </div>

    </div>

@endsection