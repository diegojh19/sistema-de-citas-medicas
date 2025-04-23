@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Datos de la Configuracion</h1>
    </div>
    <hr>

    <div class="row">

        <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
                <div class="card-tools">
                    
                </div>
            </div>

            <div class="card-body">
                
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

                                    </div>
            
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Logotipo</label>
                                <center>                                                                   
                                        <img src="{{asset('storage/'.$configuracion->logo)}}" alt="logo" width="100px">
                                </center>
                                <br>
                                <center><output id="list"></output></center>
                                <script>
                                    function archivo(evt){
                                        var files = evt.target.files;
                                        for(var i=0, f; f=files[i]; i++){
                                            if(!f.type.match('image.*')){
                                                continue;
                                            }
                                        var reader = new  FileReader();
                                        reader.onload = (function (theFile) {
                                                return function (e){
                                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="300" height="200" title="',escape (theFile.name), '"/>'].join('');

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
                            <a href="{{url('admin/configuraciones')}}" class="btn btn-secondary"> <i class="bi bi-arrow-bar-left"></i> Volver</a>
                        </div>

                    </div>

                </div>
                


                
            </div>
        </div>

        </div>

    </div>

@endsection