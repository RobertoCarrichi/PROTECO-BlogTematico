@extends('layouts.app')
@section('content')
    <section class="header__auth">
        <h1>Hola</h1>
        <h2>Inicia sesión</h2>
    </section>
    <section class="section__auth">
        <form class="form__auth" method="POST">
            @csrf
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Correo Electrónico" name="email" value="{{old('email')}}" autocomplete="email" required autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>¡Lo sientimos! El correo que ingresaste no es válido.</strong>
                </span>
            @enderror
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" required>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>Haz ingresado una contraseña incorrecta, inténtalo de nuevo.</strong>
                </span>
            @enderror
            <label id="remember">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                Recordar mis datos
            </label>
            <input type="submit">
        </form>
    </section>
@endsection