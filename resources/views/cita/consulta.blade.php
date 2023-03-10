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
                        {{-- <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('medico.citas') }}"> Atras</a>
                        </div> --}}
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

        {{-- examenes --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Examenes</span>
                        </div>
                        <div class="float-right">
                            {{-- <button onclick="abrir('modalExamenes')"  class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button> --}}

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
                                                        <a class="btn btn-sm btn-primary " href="{{ route('examenes.show',$examene->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                        {{-- <a class="btn btn-sm btn-success" href="{{ route('examenes.edit',$examene->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a> --}}
                                                        @csrf
                                                        @method('DELETE')
                                                        {{-- <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button> --}}
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
                            <span class="card-title">Diagnostico Definitivo</span>
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
            {{-- receta --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Receta</span>
                        </div>


                        <div class="float-right">
                            <a href="{{route('receta.imprimir',$cita->id)}}"  class="btn btn-success btn-sm"><i class="fa fa-print"></i></a>

                            <button onclick="abrir('modalReceta')"  class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Medicamento</th>
										<th>Dosis</th>
										<th>Duracion</th>
										<th>Instrucciones</th>
										{{-- <th>Notas</th> --}}
										{{-- <th>Id Cita</th> --}}

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recetas as $receta)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

											<td>{{ $receta->medicamento }}</td>
											<td>{{ $receta->dodis }}</td>
											<td>{{ $receta->duracion }}</td>
											<td>{{ $receta->instrucciones }}</td>
											{{-- <td>{{ $receta->notas }}</td> --}}
											{{-- <td>{{ $receta->id_cita }}</td> --}}

                                            <td>
                                                <form action="{{ route('recetas.destroy',$receta->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('recetas.show',$receta->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                    {{-- <a class="btn btn-sm btn-success" href="{{ route('recetas.edit',$receta->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a> --}}
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
            {{-- proximas citas --}}
           <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Proximas citas </span>
                    </div>


                    <div class="float-right">


                        <button onclick="traeCitas('{{$cita->id_medico}}')"  class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Fecha</th>
                                    <th>Medico</th>

                                    {{-- <th>Instrucciones</th> --}}
                                    {{-- <th>Notas</th> --}}
                                    {{-- <th>Id Cita</th> --}}

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proximas as $proxima)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $proxima->horario }}</td>
                                        <td>{{ $proxima->medico->name }}</td>

                                        {{-- <td>{{ $receta->instrucciones }}</td> --}}
                                        {{-- <td>{{ $receta->notas }}</td> --}}
                                        {{-- <td>{{ $receta->id_cita }}</td> --}}

                                        <td>
                                            <form action="{{ route('recetas.destroy',$proxima->id) }}" method="POST">
                                                {{-- <a class="btn btn-sm btn-primary " href="{{ route('recetas.show',$receta->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                {{-- <a class="btn btn-sm btn-success" href="{{ route('recetas.edit',$receta->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a> --}}
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
           {{-- fin proximas citas --}}
        </div>

        <div class="row">
            <div class="col-md-6">
                {{-- <input id="buscaProds" class="form-control form-control-lg" type="text" placeholder="Escriba el nombre / codigo" aria-label=".form-control-lg example"> --}}
                <a href="{{route('citas.atender',$cita->id)}}" class="form-control form-control-lg btn btn-warning">Atras</a>
            </div>
            <div class="col-md-6">
                {{-- <input id="buscaProds" class="form-control form-control-lg" type="text" placeholder="Escriba el nombre / codigo" aria-label=".form-control-lg example"> --}}
                <a href="{{route('citas.finalizar',$cita->id)}}"  class="form-control form-control-lg btn btn-primary">Finalizar</a>
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
                  <h5 class="modal-title" id="exampleModalLongTitle">Agregar diagnostico definitivo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="{{ route('diagnosticos.store') }}"  role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            {{-- {{ Form::label('tipo') }} --}}
                            <input type="hidden" name="tipo" class="form-control" id="tipo" value="definitivo">
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
          {{-- modal de recetas  --}}
          <div class="modal fade" id="modalReceta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Agregar receta</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="{{ route('recetas.store') }}"  role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {{ Form::label('medicamento') }}
                                    <input type="text" name="medicamento" id="medicamento" class="form-control">

                                    {{-- {{ Form::text('medicamento', $receta->medicamento, ['class' => 'form-control' . ($errors->has('medicamento') ? ' is-invalid' : ''), 'placeholder' => 'Medicamento']) }} --}}
                                    {{-- {!! $errors->first('medicamento', '<div class="invalid-feedback">:message</div>') !!} --}}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {{ Form::label('dosis') }}
                                    {{-- {{ Form::text('dodis', $receta->dodis, ['class' => 'form-control' . ($errors->has('dodis') ? ' is-invalid' : ''), 'placeholder' => 'Dodis']) }} --}}
                                    {{-- {!! $errors->first('dodis', '<div class="invalid-feedback">:message</div>') !!} --}}
                                    <input type="text" name="dodis" id="dodis" class="form-control">

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {{ Form::label('duracion') }}
                                    <input type="text" name="duracion" id="duracion" class="form-control">

                                    {{-- {{ Form::text('duracion', $receta->duracion, ['class' => 'form-control' . ($errors->has('duracion') ? ' is-invalid' : ''), 'placeholder' => 'Duracion']) }} --}}
                                    {{-- {!! $errors->first('duracion', '<div class="invalid-feedback">:message</div>') !!} --}}
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            {{ Form::label('instrucciones') }}
                        <textarea name="instrucciones" id="instrucciones" cols="30" rows="5" class="form-control"></textarea>

                            {{-- {{ Form::text('instrucciones', $receta->instrucciones, ['class' => 'form-control' . ($errors->has('instrucciones') ? ' is-invalid' : ''), 'placeholder' => 'Instrucciones']) }} --}}
                            {{-- {!! $errors->first('instrucciones', '<div class="invalid-feedback">:message</div>') !!} --}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('notas') }}
                            <input type="text" name="notas" id="notas" class="form-control">

                            {{-- {{ Form::text('notas', $receta->notas, ['class' => 'form-control' . ($errors->has('notas') ? ' is-invalid' : ''), 'placeholder' => 'Notas']) }} --}}
                            {{-- {!! $errors->first('notas', '<div class="invalid-feedback">:message</div>') !!} --}}
                        </div>
                        {{-- <div class="form-group">
                            {{ Form::label('id_cita') }}
                            {{ Form::text('id_cita', $receta->id_cita, ['class' => 'form-control' . ($errors->has('id_cita') ? ' is-invalid' : ''), 'placeholder' => 'Id Cita']) }}
                            {!! $errors->first('id_cita', '<div class="invalid-feedback">:message</div>') !!}
                        </div> --}}
                        <input type="hidden" name="id_cita" value="{{$cita->id}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
          {{-- modal proxima cita --}}
          <div class="modal fade" id="modalCitas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Agendar cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form method="POST" action="{{ route('cita.registrar') }}"  role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                            <select name="cita" id="citas-select" class="form-control" aria-label="Default select example">

                            </select>
                    </div>
                    <input type="hidden" name="id_paciente" value="{{$cita->paciente->id}}">
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submmit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        {{-- fin proxima cita  --}}
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
        function traeCitas(id) {
            let route="{{ route('cita.todas') }}";
            $.ajax({
                type:'GET',
                url:route,
                data:{
                    'idMedico':id,
                },
                success:function(response){
                 abrir('modalCitas');
                 $('#citas-select').empty();
                    llenaCitas(response.citas);
                }
            });
        }
        function llenaCitas(citas) {
            // Suponiendo que 'response.citas' es un arreglo con las citas que quieres mostrar
        //    let citas = response.citas;

            // Obtén el elemento HTML donde quieres mostrar las citas
            let citasSelect = $('#citas-select');

            // Crea un elemento HTML para la opción "Selecciona una cita"
            let optionDefault = $('<option>');
            optionDefault.attr('value', '');
            optionDefault.text('Selecciona una cita');

            // Agrega la opción al select
            citasSelect.append(optionDefault);

            // Recorre el arreglo de citas y crea una opción para cada una
            citas.forEach(function(cita) {
            // Crea un elemento HTML para la opción
            let option = $('<option>');

            // Establece el valor y el texto de la opción para que muestre la información de la cita
            option.attr('value', cita.id);
            option.text(`Fecha: ${cita.horario}`);

            // Agrega la opción al select
            citasSelect.append(option);
            });

        }

    </script>
    @stop
