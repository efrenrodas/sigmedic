@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Usuarui</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $user->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Identificacion:</strong>
                            {{ $user->identificacion }}
                        </div>
                        <div class="form-group">
                            <strong>Fechanaciemiento:</strong>
                            {{ $user->fechaNaciemiento }}
                        </div>
                        <div class="form-group">
                            <strong>Genero:</strong>
                            {{ $user->genero }}
                        </div>
                        <div class="form-group">
                            <strong>Ciudadresidencia:</strong>
                            {{ $user->ciudadResidencia }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
