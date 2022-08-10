<div class="form-group col-md-6">
    {!! Form::label('email', 'Correo Electrónico') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::email('email', null , ['class' => 'form-control'.($errors->has('email') ? ' is-invalid':null), 'placeholder' => 'Ingrese el correo']) !!}
    @error('email')
        <span class ="invalid-feedback" role="alert">
            <strong>*{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group col-md-4">
    {!! Form::label('password', 'Contraseña') !!}
    <!--<label name="name">Nombre</label>-->
    {!! Form::password('password', ['class' => 'form-control'.($errors->has('password') ? ' is-invalid':null), 'placeholder' => 'Ingrese la contraseña']) !!}
    @error('password')
    <span class ="invalid-feedback" role="alert">
        <strong>*{{ $message }}</strong>
    </span>
@enderror
</div>

