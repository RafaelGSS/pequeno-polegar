@extends('layouts.menu')

@section('title') Homepage @endsection

@section('titleMain')

<h1 align="center"> Bem vindo! Sr(a) {{ ucwords(Auth::user()->name) }}

@endsection
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	// Load the Visualization API and the corechart package.
	google.charts.load('current', {'packages':['corechart']});

	// Set a callback to run when the Google Visualization API is loaded.
	google.charts.setOnLoadCallback(drawChart);

	// Callback that creates and populates a data table,
	// instantiates the pie chart, passes in the data and
	// draws it.
	function drawChart() {

		// Create the data table.
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Topping');
		data.addColumn('number', 'Slices');
		data.addRows([
			['Alunos cadastrados' , {{$alunos[0]->count}}],
			['Alunos com pendência', {{$alunosAtraso[0]->count}}],
			['Alunos da manhã', {{$alunosPeriodoM[0]->count}}],
			['Alunos da tarde', {{$alunosPeriodoT}}]
		]);

		// Set chart options
		var options = {'title':'Gráfico dos alunos',
									 'width': 'auto',
									 'height':'auto',
								 	};

		// Instantiate and draw our chart, passing in some options.
		var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
		chart.draw(data, options);
	}
</script>
@section('main')
<div class="widget">
	<h1 align="center"> Sobre Alunos</h1>
			<div id="chart_div"></div>
</div>
<div class="widget">
 <p> Helper </p>

</div>

@endsection
