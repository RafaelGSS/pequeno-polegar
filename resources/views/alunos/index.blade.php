@extends ('layouts.menu')

@section('title') Alunos @endsection
<script>
function ifValidate(){
  var r=confirm("Tem certeza que deseja resetar todos pagamentos ?");
  if (r==true) {
    window.location="{{url('alunos/adjust/now')}}";
    resetPaid.submit();
  }
}
</script>
@section('titleMain')

<h1 align="center">
    <a href="{{ url('/home') }}" class="icon-back">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    Menu de busca
</h1>
@endsection

@section('mainPerso')
<div class="widget-horiz">
  <div class="column1">
  </div>
<table class="table table-striped">
  <tr>
    <th> # </th>
    <th>Ação</th>
    <th>Descrição</th>
  </tr>
  <tr>
    <td><span class="glyphicon glyphicon-folder-open"> </span></td>
    <td> <a href="{{ url('/alunos/showP/manha') }}">Turma da manhã </td></a>
    <td>Mostra todos os alunos do período da manhã.</td>
  </tr>
  <tr>
    <td><span class="glyphicon glyphicon-folder-open"> </span></td>
    <td> <a href="{{ url('/alunos/showP/tarde') }}">Turma da tarde</td> </a>
    <td>Mostra todos os alunos do período da tarde.</td>
  </tr>
  <tr>
    <td><span class="glyphicon glyphicon-folder-open"> </span></td>
    <td> <a href="{{ url('/alunos/show/alunos') }}">Alunos</td></a>
    <td>Mostra todos os alunos cadastrados no sistema.</td>
  </tr>
  <tr>
    <td><span class="glyphicon glyphicon-search"> </span> </td>
    <td> <a href="{{url ('/alunos/search/form') }}"> Outros </td> </a>
    <td> Outros métodos de pesquisa, personalizados.</td>
</table>
</div>
<div class="widget-horiz">
    <div class="title">
      <h1 align="center">Outras opções </h1>
    </div>
    <div class="column1">
    </div>
  <table class="table table-striped">
    <tr>
      <th> # </th>
      <th>Ação</th>
      <th>Descrição</th>
    </tr>
    <tr>
      <td><span class="glyphicon glyphicon-plus-sign"> </span></td>
      <td> <a href="{{ route('alunos.create') }}">Novo aluno</td></a>
      <td>Registra um novo aluno no banco de dados.</td>
    </tr>
    <tr>
      <td><span class=" glyphicon glyphicon-check"> </span></td>
      <td><form name="resetPaid" method="post" action="{{url('alunos/adjust/now')}}">
          <a href="#" onclick="ifValidate()">Resetar mensalidade</a>
          {{csrf_field()}}
        </form>
      </td>
      <td>Só clique aqui se o mês virar.</td>
    </tr>
  </table>

</div>
@endsection
