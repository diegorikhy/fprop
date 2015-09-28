<!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 ie" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>Identificação | Início - JET Informática</title>
    <meta name="description" content="">
    <meta name="author" content="Full Propaganda | www.fullpropaganda.com.br">
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
      <h1><a class="brand" href="#"></a></h1>

      <section>

        <?php if($this->session->flashdata('erroLogin')): ?>
        <!-- Sample alert -->
        <div class="alert alert-error alert-block fade in">
          <button class="close" data-dismiss="alert">&times;</button>
          <h4><strong>Atenção! </strong> </h4> <?php echo $this->session->flashdata('erroLogin'); ?>
        </div>
        <!-- /Sample alert -->
        <?php endif; ?>

        <!-- Login form -->
        <?php echo form_open('login/cLogin/auth/'); ?>

          <fieldset>
            <div class="control-group">
              <label class="control-label" for="login">Usuário</label>
              <div class="controls">
                <input id="icon" type="text" placeholder="Entre com seu usuário" name="usu_usuario">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="password">Senha</label>
              <div class="controls">
                <input id="password" type="password" placeholder="Digite sua Senha" name="usu_senha">
              </div>
            </div>
            <div class="form-actions">
              <button class="btn btn-primary btn-alt" type="submit"><span class="awe-signin"></span> Entrar</button>
            </div>
          </fieldset>

        <?php echo form_close(); ?>
        <!-- /Login form -->

      </section>

    </div>
    <!-- /Main login container -->

    <!-- Bootstrap scripts -->
    <!--
    <script src="js/bootstrap/bootstrap.min.js"></script>
    -->

  </body>
</html>
