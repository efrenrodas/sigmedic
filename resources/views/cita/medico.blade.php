@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mi agenda</h1>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Citas agendadas') }}
                            </span>

                             {{-- <div class="float-right">
                                <a href="{{ route('citas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div> --}}
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

										<th>Horario</th>
										<th> Paciente</th>
										{{-- <th> Medico</th> --}}
										<th>Estado</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($citas as $cita)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $cita->horario }}</td>
											<td>{{ $cita->paciente->name }}</td>
											{{-- <td>{{ $cita->medico->name }}</td> --}}
											<td>
                                                @switch($cita->estado)
                                                    @case(1)
                                                        Agendada
                                                        @break
                                                    @case(2)
                                                        En proceso
                                                        @break
                                                    @case(3)
                                                        Cancelada
                                                        @break
                                                        @case(4)
                                                        Finalizada
                                                        @break
                                                    @default

                                                @endswitch
                                               </td>

                                            <td>
                                                <form action="{{ route('citas.destroy',$cita->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('citas.atender',$cita->id) }}"><i class="fa fa-chevron-right"></i> Atender</a>
                                                    {{-- <a class="btn btn-sm btn-success" href="{{ route('citas.edit',$cita->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a> --}}
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button> --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $citas->links() !!}
            </div>
        </div>
    </div>
    @stop

    @section('css')

    @stop

    @section('js')

    @stop
