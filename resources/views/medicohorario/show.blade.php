@extends('layouts.app')

@section('template_title')
    {{ $medicohorario->name ?? 'Show Medicohorario' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Medicohorario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('medicohorarios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $medicohorario->hora }}
                        </div>
                        <div class="form-group">
                            <strong>Id Medico:</strong>
                            {{ $medicohorario->id_medico }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $medicohorario->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion:</strong>
                            {{ $medicohorario->observacion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
