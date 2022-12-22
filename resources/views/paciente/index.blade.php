@extends('layouts.app')

@section('template_title')
    Paciente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Paciente') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('pacientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
                                </a>
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
                                        
										<th>Tipo Registro</th>
										<th>Edad</th>
										<th>Seguro Medico</th>
										<th>Contacto Emergencia</th>
										<th>Numero contacto</th>
										<th>Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pacientes as $paciente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $paciente->tipo_registro }}</td>
											<td>{{ $paciente->edad }}</td>
											<td>{{ $paciente->seguroMedico }}</td>
											<td>{{ $paciente->nombreContactoEm }}</td>
											<td>{{ $paciente->numContactoEm }}</td>
											<td>{{ $paciente->user->name }}</td>

                                            <td>
                                                <form action="{{ route('pacientes.destroy',$paciente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pacientes.show',$paciente->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pacientes.edit',$paciente->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pacientes->links() !!}
            </div>
        </div>
    </div>
@endsection
