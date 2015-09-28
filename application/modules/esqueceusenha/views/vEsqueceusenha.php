 <!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 ie" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Identificação | Início - Enerwatt Engenharia</title>
		<meta name="description" content="">
		<meta name="author" content="Avant Digital | www.avantdigital.com.br">
		<meta name="robots" content="index, follow">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Styles -->
		<link rel='stylesheet' type='text/css' href='<?php echo base_url() . 'statics/admin/'; ?>css/chromatron-green.css'>

		<!-- Fav and touch icons -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() . 'statics/admin/'; ?>img/icons/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() . 'statics/admin/'; ?>img/icons/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo base_url() . 'statics/admin/'; ?>img/icons/apple-touch-icon-57-precomposed.png">

		<!-- JS Libs -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery.js"><\/script>')</script>
		<script src="<?php echo base_url() . 'statics/admin/'; ?>js/libs/modernizr.js"></script>
		<script src="<?php echo base_url() . 'statics/admin/'; ?>js/libs/selectivizr.js"></script>

		<script>
			$(document).ready(function(){

				// Close button for widgets
				$('.widget').alert();

			});
		</script>

	</head>
	<body class="login-page">

		<!-- Main login container -->
		<div class="login-container">

			<!-- Login page logo -->
			<h1><a class="brand" href="#">Chromatron Responsive Admin Backend built with Twitter Bootstrap</a></h1>

			<section>

				<?php if($this->session->flashdata('senhaalterada')): ?>
				<!-- Sample alert -->
				<div class="alert alert-success alert-block fade in">
					<h4><strong>Atenção! </strong> </h4> <?php echo $this->session->flashdata('senhaalterada'); ?>
				</div>
				<!-- /Sample alert -->
				<?php endif; ?>

				<?php if($this->session->flashdata('senhanaoalterada')): ?>
				<!-- Sample alert -->
				<div class="alert alert-error alert-block fade in">
					<h4><strong>Atenção! </strong> </h4> <?php echo $this->session->flashdata('senhanaoalterada'); ?>
				</div>
				<!-- /Sample alert -->
				<?php endif; ?>

				<!-- Login form -->
				<?php echo form_open('esqueceusenha/cEsqueceusenha/processa'); ?>

					<fieldset>
						<div class="control-group">
							<label class="control-label" for="login">E-mail</label>
							<div class="controls">
								<input id="email" type="text" placeholder="Digite seu email" name="email">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="password">CPF</label>
							<div class="controls">
								<input id="cpf" type="text" placeholder="Digite seu CPF" name="cpf">
							</div>
						</div>
						<div class="form-actions">
							<button class="btn btn-primary btn-alt" type="submit"><span class="awe-signin"></span> Recuperar senha</button>
						</div>
					</fieldset>

				<?php echo form_close(); ?>
				<!-- /Login form -->

			</section>

			<!-- Login page navigation -->
			<nav>
				<ul>
					<li><a href="<?php echo base_url() . 'login/cLogin'; ?>">Voltar para o Site</a></li>
				</ul>
			</nav>
			<!-- Login page navigation -->

		</div>
		<!-- /Main login container -->

		<!-- Bootstrap scripts -->
		<!--
		<script src="js/bootstrap/bootstrap.min.js"></script>
		-->

	</body>
</html>
