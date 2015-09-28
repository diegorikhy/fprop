<!-- Right (content) side -->
<section class="content-block" role="main">

	<!-- Breadcrumbs -->
	<ul class="breadcrumb">
		<li><a href="#"><span class="awe-home"></span> Início</a></li>
		<li class="active">Departamento</li>
	</ul>
	<!-- Breadcrumbs -->

	<h1><span class="awe-bolt"></span> Departamento</h1>

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
	@ AVISO: EDITAR SUCESSO
	-->
	<?php if($this->session->flashdata('registroEditadoComSucesso')): ?>
	<div class="alert alert-success fade in">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Sucesso!</strong> <?php echo $this->session->flashdata('registroEditadoComSucesso'); ?>
	</div>
	<?php endif; ?>


	<!--
	@ AVISO: DELETADO SUCESSO
	-->
	<?php if($this->session->flashdata('registroDeletadoComSucesso')): ?>
	<div class="alert alert-success fade in">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Sucesso!</strong> <?php echo $this->session->flashdata('registroDeletadoComSucesso'); ?>
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
	@ AVISO: ERRO NA DELEÇÃO DO REGISTRO
	-->
	<?php if($this->session->flashdata('falhaDelecaoDoRegistro')): ?>
	<div class="alert alert-error fade in">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Erro!</strong> <?php echo $this->session->flashdata('falhaDelecaoDoRegistro'); ?>
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
					<h2>Inserir Novo Departamento</h2>
				</header>

				<!-- Example horizontal forms -->
				<!-- Tab #horizontal -->
				<div class="tab-pane active" id="horizontal">

					<?php echo form_open_multipart('departamento/cDepartamento/gravar/', 'class="form-horizontal"'); ?>

						<?php echo form_fieldset('Formulário'); ?>

							<!-- NOME DO DEPARTAMENTO -->
							<div class="control-group">
								<?php echo form_label('Nome do Departamento', 'dep_nome', array('class'=>'control-label')); ?>
								<div class="controls">
									<?php echo form_input(array('id'=>'dep_nome', 'name'=>'dep_nome', 'class'=>'input-xlarge'), set_value('dep_nome')); ?>
								</div>
							</div>

							<!-- IMAGEM -->
							<div class="control-group">
								<?php echo form_label('Organograma', 'dep_thumborganograma', array('class'=>'control-label')); ?>
								<div class="controls">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new fileupload-small thumbnail"><img src="<?php echo base_url() . 'statics/admin/' ?>img/sample_content/upload-50x50.png" alt="Upload preview"></div>
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



	<!-- Grid row -->
	<div class="row-fluid">

		<!-- Data block -->
		<article class="span12 dark data-block">
			<header>
				<h2>Listagem de Departamentos</h2>
				<ul class="data-header-actions">
					<li>

						<!-- DataTable column filter -->
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Filtrar por Coluna</a>
						<ul class="dropdown-menu datatable-controls">
							<li><label class="checkbox" for="dt_col_1"><input type="checkbox" value="0" id="dt_col_1" name="toggle-cols" checked="checked"> ID</label></li>
							<li><label class="checkbox" for="dt_col_2"><input type="checkbox" value="1" id="dt_col_2" name="toggle-cols" checked="checked"> Departamento</label></li>
							<li><label class="checkbox" for="dt_col_3"><input type="checkbox" value="2" id="dt_col_3" name="toggle-cols" checked="checked"> Criado em</label></li>
							<li><label class="checkbox" for="dt_col_4"><input type="checkbox" value="3" id="dt_col_4" name="toggle-cols" checked="checked"> Última Modificação</label></li>
							<li><label class="checkbox" for="dt_col_5"><input type="checkbox" value="4" id="dt_col_5" name="toggle-cols" checked="checked"> Ações</label></li>
						</ul>
						<!-- /DataTable column filter -->

					</li>
				</ul>
			</header>
			<section>

				<table class="datatable table table-striped table-bordered table-hover" id="dataTable_departamentos">
					<thead>
						<tr>
							<th>Departamento</th>
							<th>Criado em</th>
							<th>Última Modificação</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($retrieve as $item): ?>
						<tr class="odd gradeX">
							<td class="center"><?php echo $item->dep_nome; ?></td>
							<td class="center"><?php echo $this->my_date->datetime($item->dep_criado, 'justDate'); ?></td>
							<td class="center"><?php echo $this->my_date->datetime($item->dep_ultimamodificacao, 'justDate'); ?></td>
							<td>
								<div class="btn-group-datatable">

									<a href="<?php echo base_url() . 'uploads/departamento/' . $item->dep_thumborganograma; ?>" class="btn btn-small" rel="lightbox"><span class="icon-eye-open"></span></a>
									<a href="<?php echo base_url() . 'departamento/cDepartamento/editar/' . $item->dep_id; ?>" class="btn btn-small"><span class="icon-pencil"></span></a>
									<a href="<?php echo base_url() . 'departamento/cDepartamento/deletar/' . $item->dep_id; ?>" class="btn btn-small"><span class="icon-trash"></span></a>
								</div>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

			</section>

		</article>
		<!-- /Data block -->

	</div>
	<!-- /Grid row -->


</section>
<!-- /Right (content) side -->
