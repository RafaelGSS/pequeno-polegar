@extends ('layouts.menu')

@section('titleMain')

<h1 align="center">
    <a href="{{ route('alunos.index')}}" class="icon-back">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    Aluno
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

@if(isset($true))
<form class="form" method="post" action="{{route('alunos.destroy', $aluno->id)}}">

@elseif(isset($aluno))
<form class="form" method="post" action="{{route('alunos.update', $aluno->id)}}">
  {!! method_field('PUT') !!}

@else
<form class="form" method="post" action="{{route('alunos.store')}}">
@endif

{!! csrf_field() !!}

  <div class="form-group row">
    <label for="example-text-input" class="col-xs-2 col-form-label">Nome completo:</label>
    <div class="col-xs-10">
      <input class="form-control" type="text" value="{{$aluno->name or old('name')}}" name="name" @if(isset($true)) disabled @endif>
    </div>
  </div>
  <div class="form-group row">
    <label for="example-search-input" class="col-xs-2 col-form-labe">Data de nascimento:</label>
    <div class="col-xs-10">
      <input class="form-control" type="date" value="{{$aluno->birth or old('birth')}}" name="birth" @if(isset($true)) disabled @endif>
    </div>
  </div>
  <div class="form-group row">
    <label for="example-date-input" class="col-xs-2 col-form-label">Telefone:</label>
    <div class="col-xs-10">
      <input class="form-control" type="number" value="{{$aluno->tel or old('tel')}}" name="tel" @if(isset($true)) disabled @endif>
    </div>
  </div>
  <div class="form-group row">
    <label for="example-month-input" class="col-xs-2 col-form-label">RA:</label>
    <div class="col-xs-10">
      <input class="form-control" type="number" value="{{$aluno->ra or old('ra')}}" name="ra" @if(isset($true)) disabled @endif>
    </div>
  </div>
  <div class="form-group row">
    <label for="example-week-input" class="col-xs-2 col-form-label">Período:</label>
    <div class="col-xs-10">
      Manhã
      <input class="form-check-input" type="radio" value="manha" name="period" @if(isset($true)) disabled @endif @if(isset($aluno) && $aluno->period == 'manha') checked @endif >
      Tarde
      <input class="form-check-input" type="radio" value="tarde" name="period" @if(isset($true)) disabled @endif @if(isset($aluno) && $aluno->period == 'tarde') checked @endif >
    </div>
  </div>
  <div class="form-group row">
    <label for="example-time-input" class="col-xs-2 col-form-label">Ano:</label>
    <div class="col-xs-10">
      <select name="year" class="form-control" @if(isset($true)) disabled @endif>
        <option value="" selected disabled>Escolha o ano...</option>
        <option value="Infantil 2" @if(isset($aluno) && $aluno->year == 'Infantil 2') selected @endif>Infantil 2</option>
        <option value="Pré 1" @if(isset($aluno) && $aluno->year == 'Pré 1') selected @endif>Pré 1</option>
        <option value="Pré 2" @if(isset($aluno) && $aluno->year == 'Pré 2') selected @endif>Pré 2</option>
        <option value="1 ano" @if(isset($aluno) && $aluno->year == '1 ano') selected @endif>1 ano</option>
        <option value="2 ano" @if(isset($aluno) && $aluno->year == '2 ano') selected @endif>2 ano</option>
        <option value="3 ano" @if(isset($aluno) && $aluno->year == '3 ano') selected @endif>3 ano</option>
        <option value="4 ano" @if(isset($aluno) && $aluno->year == '4 ano') selected @endif>4 ano</option>
        <option value="5 ano" @if(isset($aluno) && $aluno->year == '5 ano') selected @endif>5 ano</option>
      </select>
    </div>
      <!-- <input class="form-control" type="number" value="{{$aluno->year or old('year')}}" name="year" @if(isset($true)) disabled @endif> -->
  </div>
  <div class="form-group row">
    <label for="example-color-input" class="col-xs-2 col-form-label" @if(isset($true)) disabled @endif>Mensalidade</label>
    <div class="col-xs-10">
      Não pendente
      <input class="form-check-input" type="radio" value="1" name="paid" @if(isset($true)) disabled @endif @if(isset($aluno) && $aluno->paid == '1') checked @endif >
      Pendente
      <input class="form-check-input" type="radio" value="0" name="paid" @if(isset($true)) disabled @endif @if(isset($aluno) && $aluno->paid == '0') checked @endif>
    </div>
  </div>
  <div class="form-group botao">
  @if(isset($true))
  <input type="hidden" name="_method" value="DELETE">
  <button type="submit" class="btn btn-danger">Deletar Aluno</button>
  <a class="btn btn-success" href="{{ route('alunos.edit', $aluno->id) }}">Editar Aluno</a>
  @elseif(isset($aluno))
  <button type="submit" class="btn btn-warning">Atualizar</button>
  @else
  <button type="submit" class="btn btn-success">Cadastrar</button>
  @endif
</div>

</form>
</div>
@endsection
