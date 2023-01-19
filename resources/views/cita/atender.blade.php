@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Atender cita medica</h1>
@stop
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Atención medica</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('medico.citas') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Horario:</strong>
                            {{ $cita->horario }}
                        </div>
                        <div class="form-group">
                            <strong>Paciente:</strong>
                            {{ $cita->paciente->name }} {{ $cita->paciente->apellidos }}
                        </div>

                        <div class="form-group">
                            <strong>Estado:</strong>
                            @switch($cita->estado)
                                @case(1)
                                    {{'agendada'}}
                                    @break
                                @case(2)
                                    {{'En proceso'}}
                                    @break
                                @default

                            @endswitch
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Enfermedades') }}
                            </span>

                             <div class="float-right">
                                <button onclick="abrir('modalEnfermedades')" class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>

                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nombre</th>
                                        <th>Medicamento</th>
                                        {{-- <th>Id Paciente</th> --}}

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userenfermedades as $userenfermedade)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>

                                            <td>{{ $userenfermedade->nombre }}</td>
                                            <td>{{ $userenfermedade->medicamento }}</td>
                                            {{-- <td>{{ $userenfermedade->id_paciente }}</td> --}}

                                            <td>
                                                <form action="{{ route('userenfermedades.destroy',$userenfermedade->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('userenfermedades.show',$userenfermedade->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                    {{-- <a class="btn btn-sm btn-success" href="{{ route('userenfermedades.edit',$userenfermedade->id) }}"><i class="fa fa-fw fa-edit"></i></a> --}}
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Sintomas') }}
                            </span>

                             <div class="float-right">
                                <button onclick="abrir('modalSintomas')"  class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>

                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre</th>
										<th>Descripcion</th>
										{{-- <th>Id Paciente</th> --}}

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sintomas as $sintoma)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

											<td>{{ $sintoma->nombre }}</td>
											<td>{{ $sintoma->descripcion }}</td>
											{{-- <td>{{ $sintoma->id_paciente }}</td> --}}

                                            <td>
                                                <form action="{{ route('sintomas.destroy',$sintoma->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('sintomas.show',$sintoma->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                    {{-- <a class="btn btn-sm btn-success" onclick="traeSintoma('{{$sintoma->id}}')" ><i class="fa fa-fw fa-edit"></i></a> --}}
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
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
        {{-- examenes --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Examenes solicitados</span>
                        </div>
                        <div class="float-right">
                            <button onclick="abrir('modalExamenes')"  class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>

                        </div>
                    </div>

                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            {{-- <th>Id Cita</th> --}}

                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($examenes as $examene)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>{{ $examene->nombre }}</td>
                                                <td>{{ $examene->descripcion }}</td>
                                                {{-- <td>{{ $examene->id_cita }}</td> --}}

                                                <td>
                                                    <form action="{{ route('examenes.destroy',$examene->id) }}" method="POST">
                                                        {{-- <a class="btn btn-sm btn-primary " href="{{ route('examenes.show',$examene->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                        {{-- <a class="btn btn-sm btn-success" href="{{ route('examenes.edit',$examene->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a> --}}
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Diagnostico presuntivo</span>
                        </div>
                        <div class="float-right">
                            <button onclick="abrir('modalDiagnostico')"  class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Tipo</th>
										<th>Diagnostico</th>
										{{-- <th>Id Cita</th> --}}
										{{-- <th>Estado</th> --}}

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diagnosticos as $diagnostico)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

											<td>{{ $diagnostico->tipo }}</td>
											<td>{{ $diagnostico->diagnostico }}</td>
											{{-- <td>{{ $diagnostico->id_cita }}</td> --}}
											{{-- <td>{{ $diagnostico->estado }}</td> --}}

                                            <td>
                                                <form action="{{ route('diagnosticos.destroy',$diagnostico->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('diagnosticos.show',$diagnostico->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                    {{-- <a class="btn btn-sm btn-success" href="{{ route('diagnosticos.edit',$diagnostico->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a> --}}
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
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

        <div class="row">
            <div class="col-md-12">
                {{-- <input id="buscaProds" class="form-control form-control-lg" type="text" placeholder="Escriba el nombre / codigo" aria-label=".form-control-lg example"> --}}
            <button onclick="ir('{{$cita->id}}')" class="form-control form-control-lg btn btn-primary">Siguiente</button>
            </div>
        </div>
        &nbsp;
    </section>
    {{-- modal para agregar enfermedades  --}}
    <!-- Modal -->
        <div class="modal fade" id="modalEnfermedades" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('userenfermedades.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Agregar enfermedades </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('nombre') }}
                        {{-- {{ Form::text('nombre', $userenfermedade->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }} --}}
                        <input type="text" required name="nombre" id="nombre" class="form-control">
                        {{-- {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!} --}}
                    </div>
                    <div class="form-group">
                        {{ Form::label('medicamento') }}
                        {{-- {{ Form::text('medicamento', $userenfermedade->medicamento, ['class' => 'form-control' . ($errors->has('medicamento') ? ' is-invalid' : ''), 'placeholder' => 'Medicamento']) }} --}}
                        <input type="text" required name="medicamento" id="medicamento" class="form-control">
                        {{-- {!! $errors->first('medicamento', '<div class="invalid-feedback">:message</div>') !!} --}}
                    </div>
                   <input type="hidden" name="id_paciente" id="id_paciente" value="{{$cita->paciente->id}}">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    {{-- fin de modal --}}
    {{-- modal para sintomas --}}
    <!-- Modal -->
        <div class="modal fade" id="modalSintomas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <form method="POST" action="{{ route('sintomas.store') }}"  role="form" enctype="multipart/form-data">
                    @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Agregar sintomas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('nombre') }}
                        <input type="text" name="nombre" id="nombre" class="form-control">
                        {{-- {{ Form::text('nombre', $sintoma->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }} --}}
                        {{-- {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!} --}}
                    </div>
                    <div class="form-group">
                        {{ Form::label('descripcion') }}
                        <input type="text" name="descripcion" id="descripcion" class="form-control">
                        {{-- {{ Form::text('descripcion', $sintoma->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }} --}}
                        {{-- {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!} --}}
                    </div>
                    <input type="hidden" name="id_paciente" value="{{$cita->paciente->id}}">
                    <input type="hidden" name="id_cita" value="{{$cita->id}}">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
            </div>

            </div>
        </div>
    {{-- fin de modal sintomas --}}
    {{-- modal de examenes --}}
        <div class="modal fade" id="modalExamenes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Agregar solicitud de examen medico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form method="POST" action="{{ route('examenes.store') }}"  role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            {{ Form::label('nombre') }}
                            <input type="text" name="nombre" id="nombre" class="form-control">
                        </div>
                        <div class="form-group">
                            {{ Form::label('descripcion') }}
                            {{-- <input type="text" name="descripcion" id="descripcion" class="form-control"> --}}
                        <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        {{-- <div class="form-group">
                            {{ Form::label('id_cita') }}
                            {{ Form::text('id_cita', $examene->id_cita, ['class' => 'form-control' . ($errors->has('id_cita') ? ' is-invalid' : ''), 'placeholder' => 'Id Cita']) }}
                            {!! $errors->first('id_cita', '<div class="invalid-feedback">:message</div>') !!}
                        </div> --}}
                        <input type="hidden" name="id_cita" id="id_cita" value="{{$cita->id}}">

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submmit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        {{-- modal de diagnosticos --}}
        <div class="modal fade" id="modalDiagnostico" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Agregar diagnostico presuntivo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="{{ route('diagnosticos.store') }}"  role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            {{-- {{ Form::label('tipo') }} --}}
                            <input type="hidden" name="tipo" class="form-control" id="tipo" value="presuntivo">
                        </div>
                        <div class="form-group">
                            {{ Form::label('diagnostico') }}
                            {{-- <input type="text" name="diagnostico" class="form-control" id="diagnostico"> --}}
                            <textarea name="diagnostico" id="diagnostico" cols="30" rows="5"  class="form-control"></textarea>
                        </div>
                        <div class="form-group">

                            <input type="hidden" name="id_cita" value="{{$cita->id}}" id="id_cita">

                        </div>
                        <div class="form-group">

                            <input type="hidden" name="estado" id="estado" value="1">

                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
    @stop

    @section('css')

    @stop

    @section('js')
    <script>
        function cerrar(modal){
            $('#'+modal).modal('hide');
        }
        function abrir(modal){
            $('#'+modal).modal('show');
        }
        function traeSintoma(id) {
            let route="{{ route('sintoma.editar') }}";
            $.ajax({
                type:'GET',
                url:route,
                data:{
                    'id_sintoma':id,
                },
                success:function(response){
                    console.log(response);
                }
            });
        }
        function ir(id){
            console.log(id);
            window.location.href = '/ir/'+id;
        }
    </script>
    @stop
