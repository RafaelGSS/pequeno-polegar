@extends ('layouts.menu')

@section('title') Regitrar novo usuario @endsection

@section('titleMain')
<h1 align="center">
    <a href="{{ url('/home') }}" class="icon-back">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    Cadastrar novo usuario
</h1>
@endsection

@section('main')
<div class="widget">

@if( isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach( $errors->all() as $error)
          <p>{{$error}}</p>
        @endforeach
    </div>
@endif

<style>
.bb {
  width: 300px;
  font-size: 20px;
}

</style>

<form class="form" method="post" action="{{url('config/user')}}">
  {{ csrf_field() }}
  <div class="form-group row">
    <label for="example-text-input" class="col-xs-2 col-form-label">Usuário:</label>
    <div class="col-xs-10">
      <input class="form-control" type="text" name="name">
    </div>
  </div>
  <div class="form-group row">
    <label for="example-search-input" class="col-xs-2 col-form-labe">Senha</label>
    <div class="col-xs-10">
      <input class="form-control" type="password" name="password">
    </div>
  </div>
  <div class="form-group botao">
  <button type="submit" class="bb btn btn-primary "> Cadastrar </button>
@endsection
