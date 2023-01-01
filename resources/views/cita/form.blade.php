<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('horario') }}
            {{ Form::text('horario', $cita->horario, ['class' => 'form-control' . ($errors->has('horario') ? ' is-invalid' : ''), 'placeholder' => 'Horario']) }}
            {!! $errors->first('horario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_paciente') }}
            {{ Form::text('id_paciente', $cita->id_paciente, ['class' => 'form-control' . ($errors->has('id_paciente') ? ' is-invalid' : ''), 'placeholder' => 'Id Paciente']) }}
            {!! $errors->first('id_paciente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_medico') }}
            {{ Form::text('id_medico', $cita->id_medico, ['class' => 'form-control' . ($errors->has('id_medico') ? ' is-invalid' : ''), 'placeholder' => 'Id Medico']) }}
            {!! $errors->first('id_medico', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $cita->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>