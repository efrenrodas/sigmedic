<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_medido') }}
            {{ Form::text('id_medido', $medicosespecialidade->id_medido, ['class' => 'form-control' . ($errors->has('id_medido') ? ' is-invalid' : ''), 'placeholder' => 'Id Medido']) }}
            {!! $errors->first('id_medido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_especialidad') }}
            {{ Form::text('id_especialidad', $medicosespecialidade->id_especialidad, ['class' => 'form-control' . ($errors->has('id_especialidad') ? ' is-invalid' : ''), 'placeholder' => 'Id Especialidad']) }}
            {!! $errors->first('id_especialidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $medicosespecialidade->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $medicosespecialidade->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>