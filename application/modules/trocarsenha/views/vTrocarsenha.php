<!-- Right (content) side -->
<section class="content-block" role="main">

	<!-- Breadcrumbs -->
	<ul class="breadcrumb">
		<li><a href="#"><span class="awe-home"></span> Início</a></li>
		<li class="active">Organograma</li>
	</ul>
	<!-- Breadcrumbs -->

	<h1><span class="awe-bolt"></span> Trocar Senha</h1>

	<!-- Grid row -->
	<div class="row-fluid">


        <?php if($this->session->flashdata('erroTrocarSenha')): ?>
        <div class="alert alert-danger">
            <button class="close" type="button" data-dismiss="alert">×</button>
            <strong>Atenção!</strong> <?php echo $this->session->flashdata('erroTrocarSenha'); ?>
        </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('sucessoTrocarSenha')): ?>
        <div class="alert alert-success">
            <button class="close" type="button" data-dismiss="alert">×</button>
            <strong>Sucesso!</strong> <?php echo $this->session->flashdata('sucessoTrocarSenha'); ?>
        </div>
        <?php endif; ?>


        <!-- Login form -->
        <?php echo form_open('trocarsenha/cTrocarsenha/processa'); ?>

            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="login">Senha Atual</label>
                    <div class="controls">
                        <input id="email" type="text" placeholder="Senha atual" name="senhaAtual">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="password">Nova Senha</label>
                    <div class="controls">
                        <input id="novasenha" type="text" placeholder="Nova senha" name="novaSenha">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="password">Confirme a Nova Senha</label>
                    <div class="controls">
                        <input id="confirmeNovaSenha" type="text" placeholder="Confirme a nova senha" name="confirmeNovaSenha">
                    </div>
                </div>
                <div class="form-actions">
                    <button class="btn btn-primary btn-alt" type="submit">
                        <span class="awe-signin"></span>
                        Alterar Senha
                    </button>
                </div>
            </fieldset>

        <?php echo form_close(); ?>


	</div>
	<!-- /Grid row -->




</section>
<!-- /Right (content) side -->

