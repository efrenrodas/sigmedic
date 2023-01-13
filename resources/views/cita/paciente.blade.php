@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mis citas agendadas</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Cita') }}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('citas.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                              {{ __('Registrar nueva') }}
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
                                    
                                    <th>Horario</th>
                                   {{-- <th> Paciente</th> --}}
                                    <th> Medico</th>
                                    <th>Estado</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citas as $cita)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        
                                        <td>{{ $cita->horario }}</td>
                                        {{-- <td>{{ $cita->id_paciente }}</td> --}}
                                        <td>{{ $cita->medico->name }}</td>
                                        <td>{{ $cita->estado==1?'Agendada':'Cancelada' }}</td>

                                        <td>
                                            <form action="{{ route('citas.destroy',$cita->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('citas.show',$cita->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                {{-- <a class="btn btn-sm btn-success" href="{{ route('citas.edit',$cita->id) }}"><i class="fa fa-fw fa-edit"></i> Reagendar</a> --}}
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Cancelar</button>
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
