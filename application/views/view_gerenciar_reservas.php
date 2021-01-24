<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$local = $this->input->post('local') ? $this->input->post('local') : NULL;
?>

<button id="botao_cadastrar" class="btn btn-success"><i class="fas fa-plus-circle"></i> Adicionar nova</button>

<!--  ---------------------------------------- FULLCALENDAR ----------------------------------------  -->

<form method="post" action="<?php echo base_url('page/gerenciar_reservas'); ?>" align="center" id="form_lista">
	
	<?php $array_local = array();
		$array_local = array("" => "--- Selecione um local ---");
		foreach ($locais as $value) {
			$array_local[$value->id_local] = $value->nome_local;
		}
	$dados['array_local'] = $array_local;
	echo form_dropdown('local', $array_local, $local, 'id="local" style="width:50%; text-align-last:center; height:40px; margin-bottom:10px"');

	echo "<br>";

	$data = array(
        'name'          => 'filtrar',
        'id'            => 'filtrar',
        'value'         => 'Filtrar',
        'style'         => 'width:50%;',
        'class'			=> 'btn btn-outline-primary btn-lg'
        
    );
	echo form_submit($data); ?>
</form>

<hr>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('my_calendar');

    var my_calendar = new FullCalendar.Calendar(calendarEl, {
		dateClick: function(info) {
			var splits = info.dateStr.split("-");
			var datePtBr = splits[2] + "/" + splits[1] + "/" + splits[0];

			var d1 = info.dateStr; //dia clicado
			var d2 = moment().format("YYYY-MM-DD"); //dia atual

			if (d1 >= d2){

				Swal.fire({
				  	title: '<?= $dados_usuario->nome; ?>',
				  	html: 'Deseja acessar as do dia ' + datePtBr + '?',
				  	icon: 'question',
				  	confirmButtonText: 'Sim, acessar!',
				  	showCancelButton: true,
				  	confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					cancelButtonText: "Não!"
				}).then((result) => {
				  if (result.isConfirmed) {
				  		//code here
				    }
				})
			}
		},
    	headerToolbar: {
	        left: 'prevYear,prev,next,nextYear today',
	        center: 'title',
	        right: 'timeGridDay,timeGridWeek,dayGridMonth,listMonth,listYear'
      	},
      	// customize the button names,
		// otherwise they'd all just say "list"
		views: {
			listMonth: { buttonText: 'Lista Mensal' },
			listYear: { buttonText: 'Lista Anual' }
		},
		editable: true,
		//selectable: true,
		//businessHours: true,
		//dayMaxEvents: true, // allow "more" link when too many events
		//locale: 'pt-br',
        events:"<?= base_url('fullcalendar/load'); ?>?id_local_fk=<?php echo $local_selecionado; ?>",
		//eventColor: '#FF0000'


    });

    my_calendar.render();
  });

</script>


<style>
	#my_calendar {
		max-width: 1100px;
		margin: 0 auto;
	}
</style>

<div id='my_calendar'></div>

<!--  ---------------------------------------- FORM CADASTRO ----------------------------------------  -->

<style type="text/css">
	.alert_class{
		color: red;
	}
</style>

<button id="botao_cadastrar" class="btn btn-success"><i class="fas fa-plus-circle"></i> Adicionar nova</button>
<button id="botao_grocery_crud" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i> Exibir espaços reservados</button>

<form id="someform" enctype="multipart/form-data">

<div class="alert" id="alert" role="alert"></div>

<div class="alert alert-info" role="alert" id="alerta_local">
	<h5><b>SELECIONE O LOCAL</b></h5>
	<hr>

	<select name="local" id="local" class="form-control">
		<option value="">--- Selecione um local ---</option>
		<?php foreach ($locais as $value) {
				echo "<option value='$value->id_local'>$value->nome_local</option>";
		} ?>	
	</select>
</div>

<div class="alert alert-info" role="alert" id="alerta_periodo">
	<h5><b>SELECIONE A DATA</b></h5>
	<hr>
	<div class="form-check" id="first_date">
		<input class="form-check-input" type="checkbox" name="data_1" id="data_1" style="transform: scale(1.5);">
		<label class="form-check-label" for="data_1">
			O evento acontercerá em apenas em um dia
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

	<input type="text" id="datepicker" name="datepicker" class="form-control" placeholder="--- Selecione uma data ---">

	<input type="text" id="myrosterdate" name="myrosterdate" class="form-control" placeholder="--- Selecione as datas ---" />

	<input type="text" id="daterange" name="daterange" class="form-control" />

</div>

<div class="alert alert-info" role="alert" id="alerta_horario">
	<h5><b>SELECIONE O HORÁRIO</b></h5>
	<hr>

	<div class="form-check" id="first_date_def">
		<input class="form-check-input" type="checkbox" name="horario_unico" id="horario_unico" style="transform: scale(1.5);">
		<label class="form-check-label" for="horario_unico">
			Não vou definir horário (ficará agendado como "Dia Todo")
		</label>
	</div>

	<div id="def_horario">
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

	<div id="botao_enviar">
		<hr>
		<button type="submit" name="submit" id="submit" class="btn btn-success" value="Cadastrar">Cadastrar</button>
	</div>
</div>

<div class="alert alert-info" role="alert" id="alerta_horario_definir">
	<h5 id="h5_class"><b>SELECIONE O HORÁRIO</b></h5>
	<hr>
	<div class="form-check" id="first_date">
		<input class="form-check-input" type="checkbox" name="definir_horario[]" id="definir_horario_1" style="transform: scale(1.5);">
		<label class="form-check-label" for="definir_horario_1">
			Não vou definir horário (ficará agendado como "Dia Todo")
		</label>
	</div>
	<div class="form-check" id="second_date">
		<input class="form-check-input" type="checkbox" name="definir_horario[]" id="definir_horario_2" style="transform: scale(1.5);">
		<label class="form-check-label" for="definir_horario_2">
			Os horários serão idênticos
		</label>
	</div>
	<div class="form-check" id="third_date">
		<input class="form-check-input" type="checkbox" name="definir_horario[]" id="definir_horario_3" style="transform: scale(1.5);">
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
		$("#my_calendar").hide();
		$("#form_lista").hide();
  	});

  	$("#data_1").change(function(event){
    	if (this.checked){
    		$("#data_2").prop("checked", false);
    		$("#data_3").prop("checked", false);
			$("#datepicker").show();
			$("#myrosterdate").hide();
			$("#myrosterdate").val("");
			$("#daterange").hide();
			$("#daterange").val("");
			$("#alerta_horario").show();
			$("#alerta_horario_definir").hide();
			$("#botao_enviar").show();
    	}else{
    		$("#datepicker").hide();
    		$("#datepicker").val("");
    		$("#alerta_horario").hide();
    		$("#alerta_horario_definir").hide();
    	}
    });

    $("#data_2").change(function(event){
    	if (this.checked){
    		$("#data_1").prop("checked", false);
    		$("#data_3").prop("checked", false);
			$("#datepicker").hide();
			$("#datepicker").val("");
			$("#myrosterdate").show();
			$("#daterange").hide();
			$("#daterange").val("");
			$("#alerta_horario").hide();
			$("#alerta_horario_definir").show();
    	}else{
    		$("#myrosterdate").hide();
    		$("#myrosterdate").val("");
    		$("#alerta_horario_definir").hide();
    	}
    });

    $("#data_3").change(function(event){
    	if (this.checked){
    		$("#data_1").prop("checked", false);
    		$("#data_2").prop("checked", false);
    		$("#datepicker").hide();
    		$("#datepicker").val("");
			$("#myrosterdate").hide();
			$("#myrosterdate").val("");
			$("#daterange").show();
			$("#alerta_horario").hide();
			$("#alerta_horario_definir").show();
    	}else{
    		$("#daterange").hide();
    		$("#daterange").val("");
    		$("#alerta_horario_definir").hide();
    	}
    });

    $("#horario_unico").change(function(event){
    	if (this.checked){
    		$("#def_horario").hide();
    		$("#horario_1_inicio").val("00:00");
    		$("#horario_1_fim").val("23:59");
    	}else{
    		$("#def_horario").show();
    		$("#horario_1_inicio").val("");
    		$("#horario_1_fim").val("");
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
    		$("#horario_1_inicio").val("");
    		$("#horario_1_fim").val("");
    		$("#horario_2_inicio").val("00:00");
    		$("#horario_2_fim").val("23:59");
    		$("#myrosterdate").prop("disabled", false);
    		$("#h5_class").removeClass("alert_class");
    		$("#botao_enviar").show();
    		$("#daterange").prop("disabled", false);
			$('div#periodo_escolhido_2 #horario_multiplo').remove();
    	}else{
    		$("#myrosterdate").prop("disabled", true);
    		$("#h5_class").addClass("alert_class");
    		$("#botao_enviar").hide();
    		$("#horario_2_inicio").val("");
    		$("#horario_2_fim").val("");
    		$("#daterange").prop("disabled", true);
			$('div#periodo_escolhido_2 #horario_multiplo').remove();
			$("#horario_2_inicio").val("");
    		$("#horario_2_fim").val("");
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
    		$("#horario_1_inicio").val("");
    		$("#horario_1_fim").val("");
    		$("#horario_2_inicio").val("");
    		$("#horario_2_fim").val("");			
			$('div#periodo_escolhido_2 #horario_multiplo').remove();
    		$("#daterange").prop("disabled", false);
    	}else{
    		$("#periodo_escolhido").hide();
    		$("#myrosterdate").prop("disabled", true);
    		$("#h5_class").addClass("alert_class");
    		$("#botao_enviar").hide();
    		$("#horario_2_inicio").val("");
    		$("#horario_2_fim").val("");			
			$('div#periodo_escolhido_2 #horario_multiplo').remove();
    		$("#daterange").prop("disabled", true);
    	}
    });

    $("#definir_horario_3").change(function(event){
    	if (this.checked){
    		$("#definir_horario_1").prop("checked", false);
    		$("#definir_horario_2").prop("checked", false);
    		$("#periodo_escolhido").hide();
    		$("#horario_1_inicio").val("");
    		$("#horario_1_fim").val("");
    		$("#horario_2_inicio").val("");
    		$("#horario_2_fim").val("");
    		$("#myrosterdate").prop("disabled", false);
    		$("#daterange").prop("disabled", false);
    		$("#botao_enviar").show();

    		function setNumero(number) {
			numero = number; // numero foi criado no escopo global
			}

			function setArray(array) {
				matriz = array; // numero foi criado no escopo global
			}

			//CRIAR IF TERCEIRO CHECKBOX CHECKED AND 
			$('#myrosterdate').change(function(){
				setNumero($(this).val().split(",").length);
				setArray($(this).val().split(","));

				$('div#periodo_escolhido_2 #horario_multiplo').remove();
				for (var i = 0; i < numero; i++) {

					$('div#periodo_escolhido_2').append('<hr id="horario_multiplo">');
					$('div#periodo_escolhido_2').append('<span id="horario_multiplo">'+matriz[i]+'</span>');
					$('div#periodo_escolhido_2').append('<br id="horario_multiplo">');
					$('div#periodo_escolhido_2').append('<span id="horario_multiplo">INÍCIO: </span>');
					$('div#periodo_escolhido_2').append('<input type="time" name="horario_multiplo[]" id="horario_multiplo" /> ');
					$('div#periodo_escolhido_2').append('<span id="horario_multiplo">FIM: </span>');
					$('div#periodo_escolhido_2').append('<input type="time" name="horario_multiplo[]" id="horario_multiplo" />');
				}
			});
			$("#h5_class").removeClass("alert_class");
			$("#botao_enviar").show();
    	}else{
    		$("#myrosterdate").prop("disabled", true);
    		$("#h5_class").addClass("alert_class");
    		$("#botao_enviar").hide();
			$('div#periodo_escolhido_2 #horario_multiplo').remove();
    		$("#botao_enviar").hide();
    		$("#daterange").prop("disabled", true);
    		$("#horario_2_inicio").val("");
    		$("#horario_2_fim").val("");
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

	//validação
	$.validator.setDefaults({
	    submitHandler: function () {
	      // pega os valores digitados nos inputs
			var local = $('#local').val();
			var datepicker = $('#datepicker').val();
			var myrosterdate = $('#myrosterdate').val();
			var daterange = $('#daterange').val();
			var horario_1_inicio = $('#horario_1_inicio').val();
			var horario_1_fim = $('#horario_1_fim').val();
			var horario_2_inicio = $('#horario_2_inicio').val();
			var horario_2_fim = $('#horario_2_fim').val();

			var values = [];
			$("input[name='horario_multiplo[]']").each(function() {
			    values.push($(this).val());
			});

			// instanciando formdata na variavel fd
			var fd = new FormData();

			// adicionando valores dos inputs na variável fd
			fd.append('local', local);
			fd.append('datepicker', datepicker);
			fd.append('myrosterdate', myrosterdate);
			fd.append('daterange', daterange);
			fd.append('horario_1_inicio', horario_1_inicio);
			fd.append('horario_1_fim', horario_1_fim);
			fd.append('horario_2_inicio', horario_2_inicio);
			fd.append('horario_2_fim', horario_2_fim);
			fd.append('horario_multiplo', values);

			// iniciando função ajax para submissão do form
			$.ajax({
				url:'<?php echo base_url("actions/enviar_reserva"); ?>',
				method: 'post',
				data: fd,
				contentType: false,
				processData: false,
				success: function(result) {
					$('form').trigger("reset");
					//$('#alert').fadeIn().html(result);
					alert(result);
					//window.location.reload(); 
					}
				});
		    }
		});

		$('#someform').validate({ //validação do formulário
		    rules: {
		    	local: {
		    		required: true
		    	},
		    	datepicker: {
		    		required: true
		    	},
		    	horario_1_inicio: {
		    		required: true
		    	},
				horario_1_fim: {
		    		required: true
		    	},
		    	horario_2_inicio: {
		    		required: true
		    	},
				horario_2_fim: {
		    		required: true
		    	},
		    	myrosterdate: {
		    		required: true
		    	},
		    	'definir_horario[]': {
		    		required: true
		    	},
		    	"values[]": {
		    		required: true
		    	},
		    },
		    messages: {
		    	local: {
		        	required: "Campo Obrigatório",
		      	},
		      	datepicker: {
			        required: "Campo Obrigatório",
		      	},
		      	horario_1_inicio: {
		    		required: "Campo Obrigatório",
		    	},
				horario_1_fim: {
		    		required: "Campo Obrigatório",
		    	},
		    	myrosterdate: {
		    		required: "Campo Obrigatório",
		    	},
		    	definir_horario: {
		    		required: "Campo Obrigatório",
		    	},
		    },
		    errorElement: 'span',
		    errorPlacement: function (error, element) {
		      error.addClass('invalid-feedback');
		      element.closest('.form-group').append(error);
		    },
		    highlight: function (element, errorClass, validClass) {
		      $(element).addClass('is-invalid');
		    },
		    unhighlight: function (element, errorClass, validClass) {
		      $(element).removeClass('is-invalid');
		    }
		  });

	// input tipo data única
	$("#datepicker").datepicker({
		autoclose: true
	});
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

<script src="<?php echo base_url('assets/jquery-validation/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery-validation/additional-methods.min.js'); ?>"></script>