<?php defined('BASEPATH') OR exit('No direct script access allowed');

$nome = $this->session->usuario_logado['nome'];
$sexo = $this->session->usuario_logado['sexo'];

date_default_timezone_set('America/Sao_Paulo');
$date = date('H:i');

// leitura das datas automaticamente
$dia = date('d');
$mes = date('m');
$ano = date('Y');
$semana = date('w');
$cidade = "Rio de Janeiro";

// configuração mes 
switch ($mes){
  case 1: $mes = "janeiro"; break;
  case 2: $mes = "fevereiro"; break;
  case 3: $mes = "março"; break;
  case 4: $mes = "abril"; break;
  case 5: $mes = "maio"; break;
  case 6: $mes = "junho"; break;
  case 7: $mes = "julho"; break;
  case 8: $mes = "agosto"; break;
  case 9: $mes = "setembro"; break;
  case 10: $mes = "outubro"; break;
  case 11: $mes = "novembro"; break;
  case 12: $mes = "dezembro"; break;
}

// configuração semana 
switch ($semana) {
  case 0: $semana = "domingo"; break;
  case 1: $semana = "segunda-feira"; break;
  case 2: $semana = "terça-feira"; break;
  case 3: $semana = "quarta-feira"; break;
  case 4: $semana = "quinta-feira"; break;
  case 5: $semana = "sexta-feira"; break;
  case 6: $semana = "sábado"; break;
}


//imprimir na tela...
$data = ("$cidade, $semana, $dia de $mes de $ano - $date hs");

$welcome_message =  "<div class='alert alert-success'><b>" . ucfirst($nome) . "</b>, bem vind". ($sexo=="M"?"o":"a") . " ao sistema para <b>Reservas de Espaço Físico</b>!<br>Utilize a barra de menus para acessar as funcionalidades do sistema.<br>$data</div>";

echo $welcome_message;
?>
