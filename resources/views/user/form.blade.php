<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidos') }}
            {{ Form::text('apellidos', $user->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
            {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('identificacion') }}
            {{ Form::number('identificacion', $user->identificacion, ['class' => 'form-control' . ($errors->has('identificacion') ? ' is-invalid' : ''), 'placeholder' => 'Identificacion']) }}
            {!! $errors->first('identificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaNaciemiento') }}
            {{ Form::date('fechaNaciemiento', $user->fechaNaciemiento, ['class' => 'form-control' . ($errors->has('fechaNaciemiento') ? ' is-invalid' : ''), 'placeholder' => 'Fechanaciemiento']) }}
            {!! $errors->first('fechaNaciemiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('genero') }}
            {{ Form::text('genero', $user->genero, ['class' => 'form-control' . ($errors->has('genero') ? ' is-invalid' : ''), 'placeholder' => 'Genero']) }}
            {!! $errors->first('genero', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ciudadResidencia') }}
            {{ Form::text('ciudadResidencia', $user->ciudadResidencia, ['class' => 'form-control' . ($errors->has('ciudadResidencia') ? ' is-invalid' : ''), 'placeholder' => 'Ciudadresidencia']) }}
            {!! $errors->first('ciudadResidencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="password" class="form-group">{{ __('Password') }}</label>

            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    <div class="form-group">
        <label for="rol" class="form-group">{{ __('Rol') }}</label>

        <select class="form-select" name="rol" id="">
            @foreach ($roles as $rol)
                <option value="{{$rol->name}}">{{$rol->name}}</option>
            @endforeach
        </select>
    </div>
&nbsp;
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>