<?php

$dados = [
	'title' => 'Cavaleiros do Zodiaco',
	'start_event' => '2021-04-03,2021-04-04,2021-04-05',
	'end_event' => '2021-04-03',
	'id_local_fk' => 'Auditorio 1'
];

$teste = $this->reservas_model->inserir($dados);

//echo $teste['start_event'];

$pieces = explode(',', $teste['start_event']);

foreach ($pieces as $value) {
	echo date('d/m/Y', strtotime($value));
	?>
	<br>
	Início: <input type="time" name="<?php echo 'inicio_' . date('d_m_Y', strtotime($value)); ?>">
	Fim: <input type="time" name="<?php echo 'fim_' . date('d_m_Y', strtotime($value)); ?>">
	<hr>
<?php }

?>