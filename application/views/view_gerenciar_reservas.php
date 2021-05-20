<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$local = $this->input->post('local') ? $this->input->post('local') : NULL;
?>

<!--  ---------------------------------------- FORM CADASTRO ----------------------------------------  -->

<style type="text/css">
	.alert_class{
		color: red;
	}
	.form-group{
		padding: 10px;
	}
	label{
		margin-top: 10px;
	}
	#lbl_data_hora{
		padding-top: 20px;
		padding-right: 20px;
		padding-bottom: 10px;
	}
</style>

<span id="msg"></span>
<form id="add-evento" method="post">

	<div class="alert" id="alert" role="alert"></div>

	<!-- ---------- CAMPO 1 ---------- -->

	<label><b>Evento</b></label>
	<input type="text" name="nome_evento" class="form-control" placeholder="Digite o nome do evento">

	<!-- ---------- CAMPO 2 ---------- -->

	<label><b>Local</b></label>

	<select name="local" name="local" class="form-control">
		<option value="">--- Selecione um local ---</option>
		<?php foreach ($locais as $value) {
				echo "<option value='$value->id_local'>$value->nome_local</option>";
		} ?>	
	</select>

	<!-- ---------- CAMPO 3 ---------- -->

	<label id="lbl_data_hora"><b>Data e Hora</b></label>

	<button type="button" id="add-campo" class="btn btn-warning"><i class="fas fa-plus-circle"></i> Adicionar campo</button>

	<div id="data_hora">
		<div class="form-group">
			<input type="date" name="data[]">
			<label>Início</label> <input type="time" name="hora_inicio[]">
			<label>Fim</label> <input type="time" name="hora_fim[]">
		</div>
	</div>

	<hr>

	<!-- ---------- BOTÃO CADASTRAR ---------- -->

	<button type="submit" name="cadastrar" id="cadastrar" class="btn btn-success btn-lg btn-block" value="Cadastrar">Cadastrar</button>

</form>



<script type="text/javascript">

	$(document).ready(function(){

		var cont = 1;

		$("#add-campo").click(function(){
			cont++;
			$("#data_hora").append('<div class="form-group" id="campo'+ cont +'"><input type="date" name="data[]"> <label>Início</label> <input type="time" name="hora_inicio[]"> <label>Fim</label> <input type="time" name="hora_fim[]"><button id="'+ cont +'" class="btn-apagar btn btn-danger" style="margin-left: 10px"><i class="fas fa-minus-circle"></i></button></div>');
		});

		$("form").on("click", ".btn-apagar", function(){
			var button_id = $(this).attr("id");
			$('#campo'+ button_id +'').remove();
		});

		$('#cadastrar').click(function(){
			var dados = $("#add-evento").serialize();
			$.post("<?php echo base_url('actions/add_evento'); ?>", dados, function(retorna){
				$("#msg").html(retorna);
			});
		});

	}); //fecha jquery ready function

</script>