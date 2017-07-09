$(document).ready(function() {
	$('.nav-trigger').click(function() {
		$('.side-nav').toggleClass('visible');
	});
});


function check(parametro){
		if(parametro == 'name'){
			document.getElementById("campo").innerHTML="";
			$('#campo').append('<label>Nome: </label><input class="form-control" type="text" name="param" id="nome" />');
		}
		else if(parametro == 'ra'){
			document.getElementById("campo").innerHTML="";
      $('#campo').append('<label>RA: </label><input class="form-control" type="number" name="param" id="ra" />');
		}
		else if(parametro == 'paid'){
			document.getElementById("campo").innerHTML="";
      $('#campo').append('<p>Situação Financeira</p><div class="radio"><label><input type="radio" name="param" value="1" id="paid">Mensalidade OK</label></div><div class="radio"><label><input type="radio" name="param" value="0" id="notpaid"> Mensalidade em atraso  </div>');
		}
	}