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
                            <span class="card-title">Cantidad de citas por especialidad</span>
                        </div>
                        {{-- <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('recetas.index') }}"> Back</a>
                        </div> --}}
                    </div>

                    <div class="card-body">
                        {{-- @foreach ($especialidades->medicosesp->user-> as $especialidad)

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
