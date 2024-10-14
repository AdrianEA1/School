@extends('layouts.school')

@section('content')
    <nav id="" class="navbar-principal">
        <div class="navbar-container">
            <div class="container-logo">
                <div class="logo">
                    <img src="{{asset('assets/img/beePresent.png')}}" alt="">
                </div>
            </div>
            <div class="titleSchool">
                Escuela Secundaria Monte de las Ideas
            </div>
        </div>

    </nav>
    <div class="form-login">
    <div class="form-container">
        <form>
            @csrf
            <p for="" class="form-title">Iniciar sesión</p>
            <p for="" class="form-subtitle">Inicia sesión con tu correo electrónico</p>
            <div id="msgCatch" class="msgCatch">[Aqui van los mensajes de error]</div>
            <div class="form-group">
              <label for="email">Correo</label>
              <input type="email" class="form-control" id="email" value="{{old('email')}}" aria-describedby="emailHelp" placeholder="Correo" required>
              <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu correo electrónico con nadie.</small>
            </div>
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input type="password" class="form-control" id="password" value="{{old('password')}}" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn btn-custom" >Iniciar sesión</button>
          </form>
    </div>

    </div>
@endsection
