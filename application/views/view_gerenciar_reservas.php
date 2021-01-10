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
    format: 'dd/mm/yyyy',
    container: container,
    todayHighlight: true,
    autoclose: false,
    language: 'pt-BR'
  };
  date_input.datepicker(options);

});
</script>


<input class="form-control" id="myrosterdate" name="myrosterdate" placeholder="DD/MM/YYYY" type="text"/>