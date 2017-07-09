@extends ('layouts.menu')

@section('title') Configuracao @endsection

@section('main')

@section('titleMain')

<h1 align="center">
    <a href="{{ url('/home') }}" class="icon-back">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <b>Configurações</b>
</h1>
@endsection
<div class="widget">
  <table class="table table-striped">
      <tr>
        <th> # </th>
        <th>Ação</th>
        <th>Descrição</th>
      </tr>
      <tr>
        <td><span class="glyphicon glyphicon-folder-open"> </span></td>
        <td> <a href="{{url('config/user')}}">Cadastrar novo administrador</td></a>
        <td>Cadastra um novo usuário.</td>
      </tr>
      <tr>
        <td><span class="glyphicon glyphicon-search"> </span> </td>
        <td> <a href="#" disabled>Nova excursão</td> </a>
        <td> Outros métodos de pesquisa, personalizados.</td>
  </table>
</div>

@endsection
