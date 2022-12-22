@extends('layouts.app')

@section('template_title')
    {{ $paciente->name ?? 'Show Paciente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Paciente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pacientes.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipo Registro:</strong>
                            {{ $paciente->tipo_registro }}
                        </div>
                        <div class="form-group">
                            <strong>Edad:</strong>
                            {{ $paciente->edad }}
                        </div>
                        <div class="form-group">
                            <strong>Seguromedico:</strong>
                            {{ $paciente->seguroMedico }}
                        </div>
                        <div class="form-group">
                            <strong>Nombrecontactoem:</strong>
                            {{ $paciente->nombreContactoEm }}
                        </div>
                        <div class="form-group">
                            <strong>Numcontactoem:</strong>
                            {{ $paciente->numContactoEm }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $paciente->id_user }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
