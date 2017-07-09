@extends ('layouts.menu')

@section('title') Busca personalizada @endsection

@section('titleMain') 

<h1 align="center">
    <a href="{{ url('/alunos') }}" class="icon-back">
      <span class="glyphicon glyphicon-chevron-left"></span> 
    </a>
    Busca personalizada
</h1>
@endsection

@section('main')
<div class="widget">
	@if(isset($errors) && count($errors) > 0)
		<div class="alert alert-danger">
			  @foreach( $errors->all() as $error)
			  	<p>{{$error}}</p>
			  @endforeach
		</div>
	@endif
	<p>Você está na sessão de busca personalizada. Para buscar escolha uma das opções abaixo e preencha os campos corretamentes.</p>
	<form class="form" method="post" action="{{url ('/alunos/search/list')}}">
		  {!! csrf_field() !!}
		<div class="form-group">
			<select name="method" id="select" onchange="javascript: check(this.value)" class="form-control">
			    <option selected disabled="disabled">Escolha uma opção</option>
			    <option value="name">Busca por nome</option>
			    <option value="ra">Busca por RA</option>
			    <option value="paid">Busca por pendência</option>
		  	</select>
		</div>
		<div id="campo" class="form-group">

		</div>
		<div class="form-group">
		<button type="submit" class="btn btn-success">Buscar</button>
		</div>
	</form>
</div>
@endsection
