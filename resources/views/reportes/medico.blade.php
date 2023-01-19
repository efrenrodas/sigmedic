@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Reporte</h1>
@stop
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Cantidad de citas por medico</span>
                        </div>
                        {{-- <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('recetas.index') }}"> Back</a>
                        </div> --}}
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    {{-- <th>No</th> --}}

                                    <th>Nombre</th>
                                    <th>Creadas</th>
                                    <th>Agendadas</th>
                                    <th>En proceso</th>
                                    <th>Canceladas</th>
                                    <th>Atendidas</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $usuario)
                                    <tr>
                                        <td>{{ $usuario->name }}</td>

                                        <td>{{$usuario->citas()->where("estado",0)->count()}}</td>
                                        <td>{{ $usuario->citas()->where("estado",1)->count() }}</td>

                                        <td>{{$usuario->citas()->where("estado",2)->count()}}</td>
                                        <td>{{$usuario->citas()->where("estado",3)->count()}}</td>
                                        <td>{{$usuario->citas()->where("estado",4)->count()}}</td>
                                        <td>{{$usuario->citas()->count()}}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- @foreach ($especialidades as $especialidad)
                        {{$especialidad->nombre}}-{{$especialidad->citas()->where("estado",1)->count();}}
                        @endforeach --}}






                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop

    @section('css')

    @stop

    @section('js')

    @stop
