<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<button id="botao_cadastrar" class="btn btn-success"><i class="fas fa-plus-circle"></i> Adicionar nova</button>
<button id="botao_grocery_crud" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i> Exibir espaços reservados</button>

<script type="text/javascript">

	$(document).ready(function(){

	//starta aoenas com a div do grocery_crud
	$("#form_cadastrar").hide();
	$("#botao_grocery_crud").hide();

	//datepicker multiple
	var date_input=$('input[name="myrosterdate"]'); //our date input has the name "myrosterdate"
	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	var options={
		multidate:true,
		container: container,
		todayHighlight: true,
		autoclose: false,
		language: 'pt-BR'
	};
	date_input.datepicker(options);

});
</script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

<hr>

<input type="text" name="data_unica" class="form-control" id="datepicker" placeholder="--- Selecione uma data ---">

<hr>

<input class="form-control" id="myrosterdate" name="myrosterdate" placeholder="--- Selecione as datas ---" type="text"/>

<hr>

<input type="text" name="daterange" class="form-control" />

<script>
$(function(){
	$('input[name="daterange"]').daterangepicker({
		opens: 'right',
		locale:{
			format: 'DD/MM/Y',
			separator: " - ",
			applyLabel: "Aplicar",
			cancelLabel: "Cancelar",
			fromLabel: "De",
			toLabel: "Até",
			customRangeLabel: "Custom",
			daysOfWeek: [
			    "Dom",
			    "Seg",
			    "Ter",
			    "Qua",
			    "Qui",
			    "Sex",
			    "Sáb"
			],
			monthNames: [
			    "Janeiro",
			    "Fevereiro",
			    "Março",
			    "Abril",
			    "Maio",
			    "Junho",
			    "Julho",
			    "Agosto",
			    "Setembro",
			    "Outubro",
			    "Novembro",
			    "Dezembro"
			],
		firstDay: 0
    	},
	}, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
	$('input[name="daterange"]').val('');
   	$('input[name="daterange"]').attr("placeholder","--- Selecione um intervalo ---");
});
</script>