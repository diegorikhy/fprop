<!-- Right (content) side -->
<section class="content-block" role="main">

	<!-- Breadcrumbs -->
	<ul class="breadcrumb">
		<li><a href="#"><span class="awe-home"></span> Início</a></li>
		<li class="active">Pessoa</li>
	</ul>
	<!-- Breadcrumbs -->

	<h1><span class="awe-bolt"></span> Pessoa</h1>

	<!--
	***********************************************************************************************
	 AVISOS
	***********************************************************************************************
	-->
	<!--
	@ AVISO: SUCESSO
	-->
	<?php if($this->session->flashdata('registroInseridoComSucesso')): ?>
	<div class="alert alert-success fade in">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Sucesso!</strong> <?php echo $this->session->flashdata('registroInseridoComSucesso'); ?>
	</div>
	<?php endif; ?>


	<!--
	@ AVISO: ERRO NA INSERÇÃO
	-->
	<?php if($this->session->flashdata('falhaInsercaoDoRegistro')): ?>
	<div class="alert alert-error fade in">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Erro!</strong> <?php echo $this->session->flashdata('falhaInsercaoDoRegistro'); ?>
	</div>
	<?php endif; ?>


	<!--
	@ AVISO: ERRO NA INSERÇÃO
	-->
	<?php if($this->session->flashdata('erroValidacaoFormulario')): ?>
	<div class="alert alert-error fade in">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Erro!</strong> <?php echo $this->session->flashdata('erroValidacaoFormulario'); ?>
	</div>
	<?php endif; ?>


	<!--
	@ AVISO: ERRO UPLOAD IMAGEM
	-->
	<?php if($this->session->flashdata('erroUploadImagem')): ?>
	<div class="alert alert-error fade in">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Erro!</strong> <?php echo $this->session->flashdata('erroUploadImagem'); ?>
	</div>
	<?php endif; ?>


	<!-- Grid row -->
	<div class="row-fluid">

		<!-- Data block -->
		<article class="span12 data-block nested">
			<div class="data-container">
				<header>
					<h2>Nova Pessoa</h2>
				</header>

				<!-- Example horizontal forms -->
				<!-- Tab #horizontal -->
				<div class="tab-pane active" id="horizontal">

					<?php echo form_open_multipart('pessoa/cPessoa/gravar/', 'class="form-horizontal"'); ?>

						<?php echo form_fieldset('Formulário'); ?>

							<!-- NOME -->
							<div class="control-group">
								<?php echo form_label('Nome Completo', 'pes_nome', array('class'=>'control-label')); ?>
								<div class="controls">
									<?php echo form_input(array('id'=>'pes_nome', 'name'=>'pes_nome', 'class'=>'input-xlarge'), set_value('pes_nome')); ?>
								</div>
							</div>

							<!-- APELIDO -->
							<div class="control-group">
								<?php echo form_label('Apelido', 'pes_apelido', array('class'=>'control-label')); ?>
								<div class="controls">
									<?php echo form_input(array('id'=>'pes_apelido', 'name'=>'pes_apelido', 'class'=>'input-xlarge'), set_value('pes_apelido')); ?>
								</div>
							</div>

							<!-- DEPARTAMENTO -->
							<div class="control-group">
								<?php echo form_label('Departamento', 'dep_id', array('class'=>'control-label')); ?>
								<div class="controls">
									<?php echo form_dropdown('dep_id', $select_departamento); ?>
								</div>
							</div>

							<!-- NACIONALIDADE -->
							<div class="control-group">
								<?php echo form_label('Nacionalidade', 'pes_nacionalidade', array('class'=>'control-label')); ?>
								<div class="controls">
									<?php echo form_input(array('id'=>'pes_nacionalidade', 'name'=>'pes_nacionalidade', 'class'=>'input-xlarge'), set_value('pes_nacionalidade')); ?>
								</div>
							</div>

							<!-- NATURALIDADE -->
							<div class="control-group">
								<?php echo form_label('Naturalidade', 'pes_naturalidade', array('class'=>'control-label')); ?>
								<div class="controls">
									<?php echo form_input(array('id'=>'pes_naturalidade', 'name'=>'pes_naturalidade', 'class'=>'input-xlarge'), set_value('pes_naturalidade')); ?>
								</div>
							</div>

							<!-- CPF -->
							<div class="control-group">
								<?php echo form_label('CPF', 'pes_cpf', array('class'=>'control-label')); ?>
								<div class="controls">
									<?php echo form_input(array('id'=>'pes_cpf', 'name'=>'pes_cpf', 'class'=>'input-xlarge', 'data-mask'=>'999.999.999-99'), set_value('pes_cpf')); ?>
								</div>
							</div>

							<!-- RG -->
							<div class="control-group">
								<?php echo form_label('RG', 'pes_rg', array('class'=>'control-label')); ?>
								<div class="controls">
									<?php echo form_input(array('id'=>'pes_rg', 'name'=>'pes_rg', 'class'=>'input-small'), set_value('pes_rg')); ?>
								</div>
							</div>

							<!-- ORGÃO EXPEDIDOR -->
							<div class="control-group">
								<?php echo form_label('Orgão Expedidor', 'pes_rgorgaoexpedidor', array('class'=>'control-label')); ?>
								<div class="controls">
									<?php echo form_input(array('id'=>'pes_rgorgaoexpedidor', 'name'=>'pes_rgorgaoexpedidor', 'class'=>'input-small'), set_value('pes_rgorgaoexpedidor')); ?>
								</div>
							</div>

							<!-- RG DATA EXPEDIÇÃO -->
							<div class="control-group">
								<?php echo form_label('RG - Data de Expedição', 'pes_rgdataexpedicao', array('class'=>'control-label')); ?>
								<div class="controls">
									<div class="input-append">
										<?php echo form_input(array('id'=>'pes_rgdataexpedicao', 'placeholder'=> 'dd/mm/aaaa' , 'data-mask'=>'99/99/9999', 'name'=>'pes_rgdataexpedicao', 'class'=>'datepicker input-small'), set_value('pes_rgdataexpedicao')); ?>
										<span class="add-on"><i class="awe-calendar"></i></span>
									</div>

								</div>
							</div>


							<!-- ESTADO CIVIL -->
							<div class="control-group">
								<label class="control-label" for="select">Estado Civil</label>
								<div class="controls">
									<?php echo form_dropdown('pes_estadocivil', $select_estadocivil); ?>
								</div>
							</div>

							<!-- FORMAÇÃO ESCOLAR -->
							<div class="control-group">
								<label class="control-label" for="select">Formação Escolar</label>
								<div class="controls">
									<?php echo form_dropdown('pes_formacaoescolar', $select_formacaoescolar); ?>
								</div>
							</div>

							<!-- SEXO -->
							<div class="control-group">
								<label class="control-label" for="select">Sexo</label>
								<div class="controls">
									<label class="radio">
										<input type="radio" name="pes_sexo" id="pes_sexo_masculino" value="m">
										Masculino
									</label>
									<label class="radio">
										<input type="radio" name="pes_sexo" id="pes_sexo_feminino" value="f">
										Feminino
									</label>
								</div>
							</div>

							<!-- DATA DE NASCIMENTO -->
							<div class="control-group">
								<label class="control-label" for="pes_datanascimento">Data de Nascimento</label>
								<div class="controls">
									<div class="input-append">
										<?php echo form_input(array('id'=>'pes_datanascimento', 'placeholder'=> 'dd/mm/aaaa' , 'data-mask'=>'99/99/9999', 'name'=>'pes_datanascimento', 'class'=>'datepicker input-small'), set_value('pes_datanascimento')); ?>
										<span class="add-on"><i class="awe-calendar"></i></span>
									</div>
								</div>
							</div>

							<!-- IMAGEM -->
							<div class="control-group">
								<?php echo form_label('Foto Perfil', 'pes_foto', array('class'=>'control-label')); ?>
								<div class="controls">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new fileupload-small thumbnail"><img src="<?php echo base_url() . 'statics/admin/' ?>img/sample_content/upload-50x50.png" alt="Upload preview"></div>
										<div class="fileupload-preview fileupload-exists fileupload-small flexible raw thumbnail"></div>
										<span class="btn btn-alt btn-file">
											<span class="fileupload-new">Selecionar Foto</span>
											<span class="fileupload-exists">Trocar</span>
											<input type="file" name="userfile" size="20" />
										</span>
										<a href="#" class="btn btn-alt btn-danger fileupload-exists" data-dismiss="fileupload">Remover</a>
									</div>
								</div>
							</div>


							<!-- SALVAR -->
							<div class="form-actions">
								<button class="btn btn-alt btn-large btn-primary" type="submit">Salvar</button>
							</div>

						<?php echo form_fieldset_close(); ?>

					<?php echo form_close(); ?>

				</div>
				<!-- Tab #horizontal -->
			</div>
		</article>
		<!-- /Data block -->

	</div>
	<!-- /Grid row -->


</section>
<!-- /Right (content) side -->
