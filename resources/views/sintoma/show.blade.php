@extends('layouts.app')

@section('template_title')
    {{ $sintoma->name ?? 'Show Sintoma' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Sintoma</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sintomas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $sintoma->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $sintoma->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Id Paciente:</strong>
                            {{ $sintoma->id_paciente }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
