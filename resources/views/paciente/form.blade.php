<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('tipo_registro') }}
            {{ Form::text('tipo_registro', $paciente->tipo_registro, ['class' => 'form-control' . ($errors->has('tipo_registro') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Registro']) }}
            {!! $errors->first('tipo_registro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('edad') }}
            {{ Form::text('edad', $paciente->edad, ['class' => 'form-control' . ($errors->has('edad') ? ' is-invalid' : ''), 'placeholder' => 'Edad']) }}
            {!! $errors->first('edad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('seguroMedico') }}
            {{ Form::text('seguroMedico', $paciente->seguroMedico, ['class' => 'form-control' . ($errors->has('seguroMedico') ? ' is-invalid' : ''), 'placeholder' => 'Seguromedico']) }}
            {!! $errors->first('seguroMedico', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombreContactoEm') }}
            {{ Form::text('nombreContactoEm', $paciente->nombreContactoEm, ['class' => 'form-control' . ($errors->has('nombreContactoEm') ? ' is-invalid' : ''), 'placeholder' => 'Nombrecontactoem']) }}
            {!! $errors->first('nombreContactoEm', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numContactoEm') }}
            {{ Form::text('numContactoEm', $paciente->numContactoEm, ['class' => 'form-control' . ($errors->has('numContactoEm') ? ' is-invalid' : ''), 'placeholder' => 'Numcontactoem']) }}
            {!! $errors->first('numContactoEm', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_user') }}
            {{ Form::text('id_user', $paciente->id_user, ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id User']) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>