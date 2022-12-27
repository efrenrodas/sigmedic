@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Especialidades</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Especialidades') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('especialidades.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nueva') }}
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

										<th>Nombre</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($especialidades as $especialidade)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $especialidade->nombre }}</td>
											<td>{{ $especialidade->estado=='1'?'Activo':'Inactivo' }}</td>

                                            <td>
                                                <form action="{{ route('especialidades.destroy',$especialidade->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('especialidades.show',$especialidade->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('especialidades.edit',$especialidade->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $especialidades->links() !!}
            </div>
        </div>
    </div>
    @stop

    @section('css')

    @stop

    @section('js')

    @stop

