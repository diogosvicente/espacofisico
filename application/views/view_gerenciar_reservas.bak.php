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