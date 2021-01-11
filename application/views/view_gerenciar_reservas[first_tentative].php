<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<button id="botao_cadastrar" class="btn btn-success"><i class="fas fa-plus-circle"></i> Adicionar nova</button>
<button id="botao_grocery_crud" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i> Exibir espaços reservados</button>


<div class="alert alert-info" role="alert" id="alerta">
	<h5><b>SELECIONE O PERÍODO</b></h5>
	<hr>
	<div class="form-check" id="first_date">
		<input class="form-check-input" type="checkbox" name="data_1" id="data_1">
		<label class="form-check-label" for="data_1">
			O evento acontercerá em apenas em dia
		</label>
	</div>
	<div class="form-check" id="second_date">
		<input class="form-check-input" type="checkbox" name="data_2" id="data_2">
		<label class="form-check-label" for="data_2">
			O evento aconterá em dias não seguidos
		</label>
	</div>
	<div class="form-check" id="third_date">
		<input class="form-check-input" type="checkbox" name="data_3" id="data_3">
		<label class="form-check-label" for="data_3">
			O evento aconterá em um período entre duas datas
		</label>
	</div>
</div>

<input type="text" id="datepicker" name="data_unica" class="form-control" placeholder="--- Selecione uma data ---">

<input type="text" id="myrosterdate" name="myrosterdate" class="form-control" placeholder="--- Selecione as datas ---" />

<input type="text" id="daterange" name="daterange" class="form-control" />


<script type="text/javascript">

	$(document).ready(function(){

	//starta apenas com a div do grocery_crud
	$("#form_cadastrar").hide();
	$("#botao_grocery_crud").hide();
	$("#datepicker").hide();
	$("#myrosterdate").hide();
	$("#daterange").hide();
	$("#first_date").hide();
	$("#second_date").hide();
	$("#third_date").hide();
	$("#alerta").hide();
	



	//esconde a div do grocery crud e exibe o form para cadastro
  	$("#botao_cadastrar").click(function() {
  		$("#botao_cadastrar").hide();
  		$("#alerta").show();
  		$("#first_date").show();
		$("#second_date").show();
		$("#third_date").show();
  	});

  	$("#data_1").change(function(event){
    	if (this.checked){
    		$("#data_2").prop("checked", false);
    		$("#data_3").prop("checked", false);
			$("#datepicker").show();
			$("#myrosterdate").hide();
			$("#daterange").hide();
    	}else{
    		$("#datepicker").hide();
    	}
    });

    $("#data_2").change(function(event){
    	if (this.checked){
    		$("#data_1").prop("checked", false);
    		$("#data_3").prop("checked", false);
			$("#datepicker").hide();
			$("#myrosterdate").show();
			$("#daterange").hide();
    	}else{
    		$("#myrosterdate").hide();
    	}
    });

    $("#data_3").change(function(event){
    	if (this.checked){
    		$("#data_1").prop("checked", false);
    		$("#data_2").prop("checked", false);
    		$("#datepicker").hide();
			$("#myrosterdate").hide();
			$("#daterange").show();
    	}else{
    		$("#daterange").hide();
    	}
    });

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