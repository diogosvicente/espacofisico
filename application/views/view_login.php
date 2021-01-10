<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Espaço Físico - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/Login_v19/images/logomarca-uerj.png'); ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/vendor/bootstrap/css/bootstrap.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/fonts/Linearicons-Free-v1.0.0/icon-font.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/vendor/animate/animate.css'); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/vendor/css-hamburgers/hamburgers.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/vendor/animsition/css/animsition.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/vendor/select2/select2.min.css'); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/vendor/daterangepicker/daterangepicker.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/css/util.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/css/main.css'); ?>">
<!--===============================================================================================-->
<style type="text/css">
	#logo{
		margin-top: 25px;
		width: 100px;
	}
</style>
</head>
<body>

	<?php
        if($this->session->flashdata("success")):
           echo "<p align='center' class='alert alert-success'>" . $this->session->flashdata("success") . "</p>";
        elseif($this->session->flashdata("danger")):
          echo "<p align='center' class='alert alert-danger'>" . $this->session->flashdata("danger") . "</p>";
        endif;

        if($this->session->userdata("usuario_logado")) :
          echo anchor("login/logout", "Sair", array("class" => "btn btn-primary btn-lg btn-block"));
          
        else : ?>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url('assets/Login_v19/images/fundo.jpg'); ?>');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form method="post" action="<?= base_url('login/autenticar'); ?>">
					<span class="login100-form-title p-b-33">
						Espaço Físico - Login
					</span>

					<div class="wrap-input100">
						<input class="input100" type="text" name="login" placeholder="Login" required="required">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1">
						<input class="input100" type="password" name="senha" placeholder="Senha" required="required">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Entrar
						</button>
					</div>

					<div class="text-center">
						<img id="logo" src="<?php echo base_url('assets/Login_v19/images/logomarca-uerj.png'); ?>">
					</div>

					<div class="text-center" style="margin-top: 20px">
						<p>
							<font size="2">Prefeitura dos Campi da UERJ - DESEG - DIPOC - <b>SERCEFI</b></font>
							<br>
							<font size="2">Serviço de Cessão de Espaço Físico</font>
						</p>
					</div>
				</form>

			<?php endif ?>

			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/Login_v19/vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/Login_v19/vendor/animsition/js/animsition.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/Login_v19/vendor/bootstrap/js/popper.js'); ?>"></script>
	<script src="<?php echo base_url('assets/Login_v19/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/Login_v19/vendor/select2/select2.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/Login_v19/vendor/daterangepicker/moment.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/Login_v19/vendor/daterangepicker/daterangepicker.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/Login_v19/vendor/countdowntime/countdowntime.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/Login_v19/js/main.js'); ?>"></script>

</body>
</html>