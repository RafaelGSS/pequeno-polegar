@extends ('layouts.menu')

@section('title') Busca por período @endsection
@section('titleMain')

<h1 align="center">
    <a href="{{ url('/alunos') }}" class="icon-back">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
  {{$titleH or 'Alunos'}}
@endsection

@section('main')
<div class="widget">
<table class="table table-striped">
<tr>
  <th>Nome</th>
  <th>Ano</th>
  <th>Período</th>
  <th>Mensalidade</th>
  <th>Ação</th>
</tr>
@foreach ($result as $aluno)
<tr>
  <td>{{$aluno->name}}</td>
  <td>{{$aluno->year}}</td>
  <td>{{ucwords($aluno->period)}}</td>
  <td>
      @if($aluno->paid == 1)
          <span class="glyphicon glyphicon-ok"></span>
      @else
       <span class="glyphicon glyphicon-remove"></span>
      @endif
  </td>
  <td>
    <a href="{{route('alunos.show', $aluno->id)}}">
      <span class="glyphicon glyphicon-eye-open"></span>
    </a>
    @if($aluno->paid == 0 && Request::path() <> 'alunos/search/list')
    <a href="{{url('alunos/paid/student', $aluno->id)}}" style="padding-left: 7px">
      <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
    </a>
    @endif
  </td>

@endforeach
</table>
</div>

@endsection
