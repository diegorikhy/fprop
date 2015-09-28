<!-- Right (content) side -->
<section class="content-block" role="main">

	<!-- Breadcrumbs -->
	<ul class="breadcrumb">
		<li><a href="#"><span class="awe-home"></span> Início</a></li>
		<li class="active">Departamento</li>
		<li class="active"><?php echo $retrieve[0]->dep_nome; ?></li>
	</ul>
	<!-- Breadcrumbs -->

	<h1><span class="awe-bolt"></span> Departamento</h1>

	<!--
	***********************************************************************************************
	 AVISOS
	***********************************************************************************************
	-->

	<!--
	@ AVISO: EDITAR SUCESSO
	-->
	<?php if($this->session->flashdata('registroEditadoComSucesso')): ?>
	<div class="alert alert-success fade in">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Sucesso!</strong> <?php echo $this->session->flashdata('registroEditadoComSucesso'); ?>
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
					<h2>Editar Departamento</h2>
				</header>

				<!-- Example horizontal forms -->
				<!-- Tab #horizontal -->
				<div class="tab-pane active" id="horizontal">

					<?php echo form_open_multipart('departamento/cDepartamento/processaEditar/' . $retrieve[0]->dep_id, 'class="form-horizontal"'); ?>

						<?php echo form_fieldset('Formulário'); ?>

							<!-- NOME DO DEPARTAMENTO -->
							<div class="control-group">
								<?php echo form_label('Nome do Departamento', 'dep_nome', array('class'=>'control-label')); ?>
								<div class="controls">
									<?php echo form_input(array('id'=>'dep_nome', 'name'=>'dep_nome', 'class'=>'input-xlarge', 'value'=>$retrieve[0]->dep_nome), set_value('dep_nome')); ?>
								</div>
							</div>

							<!-- IMAGEM -->
							<div class="control-group">
								<?php echo form_label('Organograma', 'dep_thumborganograma', array('class'=>'control-label')); ?>
								<div class="controls">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new fileupload-small thumbnail"><img src="<?php echo base_url() . 'uploads/departamento/' . $retrieve[0]->dep_thumborganograma; ?>" alt="Upload preview"></div>
										<div class="fileupload-preview fileupload-exists fileupload-small flexible raw thumbnail"></div>
										<span class="btn btn-alt btn-file">
											<span class="fileupload-new">Selecionar Organograma</span>
											<span class="fileupload-exists">Trocar</span>
											<input type="file" name="userfile" size="20" />
										</span>
										<a href="#" class="btn btn-alt btn-danger fileupload-exists" data-dismiss="fileupload">Remover</a>
									</div>
								</div>
							</div>

							<!-- EDITAR -->
							<div class="form-actions">
								<button class="btn btn-alt btn-large btn-primary" type="submit">Editar</button>
							</div>

						<?php echo form_fieldset_close(); ?>

					<?php echo form_close(); ?>

				</div>
				<!-- Tab #horizontal -->
			</div>
		</article>
		<!-- /Data block -->

		<a href="<?php echo base_url() . 'departamento/cDepartamento/index/' ?>" class="btn" title="Voltar para a listagem geral">Voltar para a listagem geral</a>


	</div>
	<!-- /Grid row -->




</section>
<!-- /Right (content) side -->
