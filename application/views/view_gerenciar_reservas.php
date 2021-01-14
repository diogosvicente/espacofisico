<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style type="text/css">
	.alert_class{
		color: red;
	}
</style>

<button id="botao_cadastrar" class="btn btn-success"><i class="fas fa-plus-circle"></i> Adicionar nova</button>
<button id="botao_grocery_crud" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i> Exibir espaços reservados</button>

<div class="alert alert-info" role="alert" id="alerta_local">
	<h5><b>SELECIONE O LOCAL</b></h5>
	<hr>

	<?php $array_local = array();
		$array_local = array("" => "--- Selecione um local ---");
		foreach ($locais as $value) {
			$array_local[$value->id_local] = $value->nome_local;
		}
	$dados['array_local'] = $array_local;
	echo form_dropdown('local', $array_local, $local_selecionado, 'id="local" class="form-control"');
	?>

</div>
<form id="someform">
<div class="alert alert-info" role="alert" id="alerta_periodo">
	<h5><b>SELECIONE A DATA</b></h5>
	<hr>
	<div class="form-check" id="first_date">
		<input class="form-check-input" type="checkbox" name="data_1" id="data_1" style="transform: scale(1.5);">
		<label class="form-check-label" for="data_1">
			O evento acontercerá em apenas em dia
		</label>
	</div>
	<div class="form-check" id="second_date">
		<input class="form-check-input" type="checkbox" name="data_2" id="data_2" style="transform: scale(1.5);">
		<label class="form-check-label" for="data_2">
			O evento aconterá em dias não seguidos
		</label>
	</div>
	<div class="form-check" id="third_date">
		<input class="form-check-input" type="checkbox" name="data_3" id="data_3" style="transform: scale(1.5);">
		<label class="form-check-label" for="data_3">
			O evento aconterá em um período entre duas datas
		</label>
	</div>

	<hr>

	<input type="text" id="datepicker" name="data_unica" class="form-control" placeholder="--- Selecione uma data ---">

	<input type="text" id="myrosterdate" name="myrosterdate" class="form-control" placeholder="--- Selecione as datas ---" />

	<input type="text" id="daterange" name="daterange" class="form-control" />

</div>

<div class="alert alert-info" role="alert" id="alerta_horario">
	<h5><b>SELECIONE O HORÁRIO</b></h5>
	<hr>
	<div class="form-group row">
		<label class="col-sm-1 col-form-label">INÍCIO</label>
		<div class="col-sm-11">
			<input type="time" id="horario_1_inicio" name="horario_1_inicio" class="form-control">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-1 col-form-label">FIM</label>
		<div class="col-sm-11">
			<input type="time" id="horario_1_fim" name="horario_1_fim" class="form-control">
		</div>
	</div>
</div>

<div class="alert alert-info" role="alert" id="alerta_horario_definir">
	<h5 id="h5_class"><b>SELECIONE O HORÁRIO</b></h5>
	<hr>
	<div class="form-check" id="first_date">
		<input class="form-check-input" type="checkbox" name="definir_horario_1" id="definir_horario_1" style="transform: scale(1.5);">
		<label class="form-check-label" for="definir_horario_1">
			Não vou definir horário (ficará agendado como "Dia Todo")
		</label>
	</div>
	<div class="form-check" id="second_date">
		<input class="form-check-input" type="checkbox" name="definir_horario_2" id="definir_horario_2" style="transform: scale(1.5);">
		<label class="form-check-label" for="definir_horario_2">
			Os horários serão idênticos
		</label>
	</div>
	<div class="form-check" id="third_date">
		<input class="form-check-input" type="checkbox" name="definir_horario_3" id="definir_horario_3" style="transform: scale(1.5);">
		<label class="form-check-label" for="definir_horario_3">
			Os horários serão diferentes
		</label>
	</div>

	<div id="periodo_escolhido">
		<hr>
		<div class="form-group row">
			<label class="col-sm-1 col-form-label">INÍCIO</label>
			<div class="col-sm-11">
				<input type="time" id="horario_2_inicio" name="horario_2_inicio" class="form-control">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-1 col-form-label">FIM</label>
			<div class="col-sm-11">
				<input type="time" id="horario_2_fim" name="horario_2_fim" class="form-control">
			</div>
		</div>
	</div>

	<div id="periodo_escolhido_2"></div>

	<div id="botao_enviar">
		<hr>
		<button type="submit" name="submit" id="submit" class="btn btn-success" value="Cadastrar">Cadastrar</button>
	</div>
</div>


</form>

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
	$("#alerta_local").hide();
	$("#alerta_periodo").hide();
	$("#alerta_horario").hide();
	$("#alerta_horario_definir").hide();
	$("#periodo_escolhido").hide();
	$("#botao_enviar").hide();
		
	//esconde a div do grocery crud e exibe o form para cadastro
  	$("#botao_cadastrar").click(function() {
  		$("#botao_cadastrar").hide();
  		$("#alerta_local").show();
  		$("#alerta_periodo").show();
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
			$("#alerta_horario").show();
			$("#alerta_horario_definir").hide();
    	}else{
    		$("#datepicker").hide();
    		$("#alerta_horario").hide();
    		$("#alerta_horario_definir").hide();
    	}
    });

    $("#data_2").change(function(event){
    	if (this.checked){
    		$("#data_1").prop("checked", false);
    		$("#data_3").prop("checked", false);
			$("#datepicker").hide();
			$("#myrosterdate").show();
			$("#daterange").hide();
			$("#alerta_horario").hide();
			$("#alerta_horario_definir").show();
    	}else{
    		$("#myrosterdate").hide();
    		$("#alerta_horario_definir").hide();
    	}
    });

    $("#data_3").change(function(event){
    	if (this.checked){
    		$("#data_1").prop("checked", false);
    		$("#data_2").prop("checked", false);
    		$("#datepicker").hide();
			$("#myrosterdate").hide();
			$("#daterange").show();
			$("#alerta_horario").hide();
			$("#alerta_horario_definir").show();
    	}else{
    		$("#daterange").hide();
    		$("#alerta_horario_definir").hide();
    	}
    });

    $("#h5_class").addClass("alert_class");
    $("#myrosterdate").prop("disabled", true);
    $("#daterange").prop("disabled", true);

    $("#definir_horario_1").change(function(event){
    	if (this.checked){
    		$("#definir_horario_2").prop("checked", false);
    		$("#definir_horario_3").prop("checked", false);
    		$("#alerta_horario").hide();
    		$("#periodo_escolhido").hide();
    		$("#myrosterdate").prop("disabled", false);
    		$("#h5_class").removeClass("alert_class");
    		$("#botao_enviar").show();
    	}else{
    		$("#myrosterdate").prop("disabled", true);
    		$("#h5_class").addClass("alert_class");
    		$("#botao_enviar").hide();
    	}
    });

    $("#definir_horario_2").change(function(event){
    	if (this.checked){
    		$("#definir_horario_1").prop("checked", false);
    		$("#definir_horario_3").prop("checked", false);
    		$("#periodo_escolhido").show();
    		$("#myrosterdate").prop("disabled", false);
    		$("#h5_class").removeClass("alert_class");
    		$("#botao_enviar").show();
    	}else{
    		$("#periodo_escolhido").hide();
    		$("#myrosterdate").prop("disabled", true);
    		$("#h5_class").addClass("alert_class");
    		$("#botao_enviar").hide();
    	}
    });

    $("#definir_horario_3").change(function(event){
    	if (this.checked){
    		$("#definir_horario_1").prop("checked", false);
    		$("#definir_horario_2").prop("checked", false);
    		$("#periodo_escolhido").hide();
    		$("#myrosterdate").prop("disabled", false);

    		function setNumero(number) {
			numero = number; // numero foi criado no escopo global
			}

			function setArray(array) {
				matriz = array; // numero foi criado no escopo global
			}

			$('#myrosterdate').change(function(){
				setNumero($(this).val().split(",").length);
				setArray($(this).val().split(","));
				$('div#periodo_escolhido_2 #something').remove();
				for (var i = 0; i < numero; i++) {
					console.log(matriz[i]);
					$('div#periodo_escolhido_2').append('<hr id="something">');
					$('div#periodo_escolhido_2').append('<span id="something">'+matriz[i]+'</span>');
					$('div#periodo_escolhido_2').append('<br id="something">');
					$('div#periodo_escolhido_2').append('<span id="something">INÍCIO: </span>');
					$('div#periodo_escolhido_2').append('<input type="time" name="something" id="something" /> ');
					$('div#periodo_escolhido_2').append('<span id="something">FIM: </span>');
					$('div#periodo_escolhido_2').append('<input type="time" name="something" id="something" />');
				}
			});
			$("#h5_class").removeClass("alert_class");
			$("#botao_enviar").show();
    	}else{
    		$("#myrosterdate").prop("disabled", true);
    		$("#h5_class").addClass("alert_class");
    		$("#botao_enviar").hide();
    	}
    });


    $("#datepicker").on("change paste keyup", function() {
		$(this).val(); 
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
	$( function(){
		$("#datepicker").datepicker();
	});
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