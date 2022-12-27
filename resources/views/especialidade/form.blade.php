<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $especialidade->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $especialidade->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <div class="form-group">
            <select name="estado" class="form-control" required aria-label="Default select example">
                <option value="" selected>Estado</option>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
               
                
              </select>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>