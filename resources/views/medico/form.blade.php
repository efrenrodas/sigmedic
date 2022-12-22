<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('registroSennecyt') }}
            {{ Form::text('registroSennecyt', $medico->registroSennecyt, ['class' => 'form-control' . ($errors->has('registroSennecyt') ? ' is-invalid' : ''), 'placeholder' => 'Registrosennecyt']) }}
            {!! $errors->first('registroSennecyt', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('universidadGraduación') }}
            {{ Form::text('universidadGraduación', $medico->universidadGraduación, ['class' => 'form-control' . ($errors->has('universidadGraduación') ? ' is-invalid' : ''), 'placeholder' => 'Universidadgraduación']) }}
            {!! $errors->first('universidadGraduación', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('experiencia') }}
            {{ Form::text('experiencia', $medico->experiencia, ['class' => 'form-control' . ($errors->has('experiencia') ? ' is-invalid' : ''), 'placeholder' => 'Experiencia']) }}
            {!! $errors->first('experiencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_user') }}
            {{ Form::text('id_user', $medico->id_user, ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id User']) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>