<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('medicamento') }}
            {{ Form::text('medicamento', $receta->medicamento, ['class' => 'form-control' . ($errors->has('medicamento') ? ' is-invalid' : ''), 'placeholder' => 'Medicamento']) }}
            {!! $errors->first('medicamento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $receta->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_cita') }}
            {{ Form::text('id_cita', $receta->id_cita, ['class' => 'form-control' . ($errors->has('id_cita') ? ' is-invalid' : ''), 'placeholder' => 'Id Cita']) }}
            {!! $errors->first('id_cita', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>