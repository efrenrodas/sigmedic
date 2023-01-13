@extends('layouts.app')

@section('template_title')
    {{ $userenfermedade->name ?? 'Show Userenfermedade' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Userenfermedade</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('userenfermedades.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $userenfermedade->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Medicamento:</strong>
                            {{ $userenfermedade->medicamento }}
                        </div>
                        <div class="form-group">
                            <strong>Id Paciente:</strong>
                            {{ $userenfermedade->id_paciente }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
