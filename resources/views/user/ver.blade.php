@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Ver </h1>
@stop
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Medico</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('dame.medicos') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $user->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Identificacion:</strong>
                            {{ $user->identificacion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de naciemiento:</strong>
                            {{ $user->fechaNaciemiento }}
                        </div>
                        <div class="form-group">
                            <strong>Genero:</strong>
                            {{ $user->genero }}
                        </div>
                        <div class="form-group">
                            <strong>Ciudad de residencia:</strong>
                            {{ $user->ciudadResidencia }}
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Foto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" onclick="abrir('modalFoto')" > Cambiar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <img src="{{asset('storage').'/'.$user->imagen}}" alt="..." class="img-thumbnail">

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Especialidades</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary"  onclick="agregarEspecialidades({{$user->id}})"> Agregar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										{{-- <th>Medico</th> --}}
										<th>Especialidad</th>
										<th>Estado</th>
										<th>Precio</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicoespe as $medicosespecialidade)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

											{{-- <td>{{ $medicosespecialidade->user->name }}</td> --}}
											<td>{{ $medicosespecialidade->especialidad->nombre }}</td>
											<td>{{ $medicosespecialidade->estado=='1'?'Activo':'Inactivo' }}</td>
											<td>{{ $medicosespecialidade->precio }}</td>

                                            <td>
                                                <form action="{{ route('medicosespecialidades.destroy',$medicosespecialidade->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('medicosespecialidades.show',$medicosespecialidade->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                    {{-- <a class="btn btn-sm btn-success" href="{{ route('medicosespecialidades.edit',$medicosespecialidade->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a> --}}
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

         {{-- modal de especialidades --}}
         <div class="modal fade" id="modalEspecialidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Especialidad</h5>
                    <button onclick="cerrar('modalEspecialidad')" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('medicosespecialidades.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_medido" id="id_medido" value="">
                        <div class="form-group">
                            <select name="id_especialidad" class="form-control" required aria-label="Default select example">
                                <option value="" selected>Especialidad</option>
                                @foreach ($especialidades as $especialidad)
                                <option value="{{$especialidad->id}}" >{{$especialidad->nombre}}</option>
                                @endforeach
                            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}


                              </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="number" step="0.01" name="precio" id="precio">
                        </div>
                        <div class="form-group">
                            <select name="estado" class="form-control" required aria-label="Default select example">
                                <option value="" selected>Estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}


                              </select>
                        </div>
                        <div class="box-footer mt20">
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>




                </div>
                <div class="modal-footer">

                    {{-- <button type="submit" class="btn btn-primary">Agregar</button> --}}
                </div>
                </div>
            </div>
        </div>
  <!-- fin de modal  -->
     {{-- modal de imagen de perfil --}}
     <div class="modal fade" id="modalFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar foto</h5>
                <button onclick="cerrar('modalFoto')" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('fotoMedico') }}"  role="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_medico" id="id_medico" value="{{$user->id}}">

                   <input type="file" required class="form-control" name="imagen" id="imagen">
                    &nbsp;
                    <div class="box-footer mt20">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                {{-- <button type="submit" class="btn btn-primary">Agregar</button> --}}
            </div>
            </div>
        </div>
    </div>
<!-- fin de modal imagen  -->
    </section>
    @stop

    @section('css')

    @stop

    @section('js')
    <script>
        function agregarEspecialidades(idMedico) {
            $('#id_medido').val(idMedico);
            abrir('modalEspecialidad');
        }
        function cerrar(modal){
            $('#'+modal).modal('hide');
        }
        function abrir(modal){
            $('#'+modal).modal('show');
        }
    </script>
    @stop

