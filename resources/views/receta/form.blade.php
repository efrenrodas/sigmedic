<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('medicamento') }}
            {{ Form::text('medicamento', $receta->medicamento, ['class' => 'form-control' . ($errors->has('medicamento') ? ' is-invalid' : ''), 'placeholder' => 'Medicamento']) }}
            {!! $errors->first('medicamento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dodis') }}
            {{ Form::text('dodis', $receta->dodis, ['class' => 'form-control' . ($errors->has('dodis') ? ' is-invalid' : ''), 'placeholder' => 'Dodis']) }}
            {!! $errors->first('dodis', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('duracion') }}
            {{ Form::text('duracion', $receta->duracion, ['class' => 'form-control' . ($errors->has('duracion') ? ' is-invalid' : ''), 'placeholder' => 'Duracion']) }}
            {!! $errors->first('duracion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('instrucciones') }}
            {{ Form::text('instrucciones', $receta->instrucciones, ['class' => 'form-control' . ($errors->has('instrucciones') ? ' is-invalid' : ''), 'placeholder' => 'Instrucciones']) }}
            {!! $errors->first('instrucciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('notas') }}
            {{ Form::text('notas', $receta->notas, ['class' => 'form-control' . ($errors->has('notas') ? ' is-invalid' : ''), 'placeholder' => 'Notas']) }}
            {!! $errors->first('notas', '<div class="invalid-feedback">:message</div>') !!}
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