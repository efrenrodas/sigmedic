@extends('layouts.app')

@section('template_title')
    {{ $medico->name ?? 'Show Medico' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Medico</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('medicos.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Registrosennecyt:</strong>
                            {{ $medico->registroSennecyt }}
                        </div>
                        <div class="form-group">
                            <strong>Universidadgraduación:</strong>
                            {{ $medico->universidadGraduación }}
                        </div>
                        <div class="form-group">
                            <strong>Experiencia:</strong>
                            {{ $medico->experiencia }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $medico->id_user }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
