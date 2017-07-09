<!DOCTYPE html>
<html>
<head>
  <title>Sistema Escolar | Login</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
  @if( isset($errors) && count($errors) > 0)
      <div class="alert">
          @foreach( $errors->all() as $error)
            <p>{{$error}}</p>
          @endforeach
      </div>
  @endif
<div class="container">
    <img src="{{ asset('img/user.png') }}" />
  <form method="post" action="{{route('login')}}">
    {{ csrf_field() }}
    <div class="form-input">
       <input type="text" name="name" placeholder="Usuario" />
    </div>
    <div class="form-input">
       <input type="password" name="password" placeholder="Senha"  />
    </div>
    <div class="button">
      <button type="submit" class="btn">Entrar</button>
    </div>
  </form>

</div>

</body>
</html>
