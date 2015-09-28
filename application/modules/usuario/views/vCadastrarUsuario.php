<!-- Right (content) side -->
<section class="content-block" role="main">

	<!-- Breadcrumbs -->
	<ul class="breadcrumb">
		<li><a href="#"><span class="awe-home"></span> Início</a></li>
		<li class="active">Módulo: Usuários</li>
		<li class="active">Cadastrar Usuário</li>
	</ul>
	<!-- Breadcrumbs -->

	<h1><span class="awe-bolt"></span> Usuário</h1>

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


	<!-- Grid row -->
	<div class="row-fluid">

		<!-- Data block -->
		<article class="span12 data-block nested">
			<div class="data-container">
				<header>
					<h2>Novo Usuário</h2>
				</header>

				<!-- Example horizontal forms -->
				<!-- Tab #horizontal -->
				<div class="tab-pane active" id="horizontal">

					<?php echo form_open_multipart('usuario/cUsuario/gravar/', 'class="form-horizontal"'); ?>

						<?php echo form_fieldset('Formulário'); ?>

							<!-- PESSOA -->
							<div class="control-group">
								<?php echo form_label('Tipo de usuário', 'pes_id', array('class'=>'control-label')); ?>
								<div class="controls">
									<?php echo form_dropdown('pes_id', $select_pessoas); ?>
								</div>
							</div>

							<!-- USUÁRIO -->
							<div class="control-group">
								<?php echo form_label('Usuário', 'usu_usuario', array('class'=>'control-label')); ?>
								<div class="controls">
									<?php echo form_input(array('id'=>'usu_usuario', 'name'=>'usu_usuario', 'class'=>'input-xlarge'), set_value('usu_usuario')); ?>
								</div>
							</div>

							<!-- SENHA -->
							<div class="control-group">
								<?php echo form_label('Senha', 'usu_senha', array('class'=>'control-label')); ?>
								<div class="controls">
									<?php echo form_input(array('id'=>'usu_senha', 'name'=>'usu_senha', 'class'=>'input-xlarge'), set_value('usu_senha')); ?>
								</div>
							</div>

							<!-- CONFIRMAR SENHA -->
							<div class="control-group">
								<?php echo form_label('Confirmar Senha', 'usu_confirmarsenha', array('class'=>'control-label')); ?>
								<div class="controls">
									<?php echo form_input(array('id'=>'usu_confirmarsenha', 'name'=>'usu_confirmarsenha', 'class'=>'input-xlarge'), set_value('usu_confirmarsenha')); ?>
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
				<h2>Listagem de Usuários</h2>
				<ul class="data-header-actions">
					<li>

						<!-- DataTable column filter -->
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Filtrar por Coluna</a>
						<ul class="dropdown-menu datatable-controls">
							<li><label class="checkbox" for="dt_col_1"><input type="checkbox" value="0" id="dt_col_1" name="toggle-cols" checked="checked"> ID</label></li>
							<li><label class="checkbox" for="dt_col_2"><input type="checkbox" value="1" id="dt_col_2" name="toggle-cols" checked="checked"> Usuário</label></li>
							<li><label class="checkbox" for="dt_col_3"><input type="checkbox" value="2" id="dt_col_3" name="toggle-cols" checked="checked"> Tipo</label></li>
							<li><label class="checkbox" for="dt_col_4"><input type="checkbox" value="3" id="dt_col_4" name="toggle-cols" checked="checked"> Criado em</label></li>
						</ul>
						<!-- /DataTable column filter -->

					</li>
				</ul>
			</header>
			<section>

				<table class="datatable table table-striped table-bordered table-hover" id="dataTable_departamentos">
					<thead>
						<tr>
							<th>Usuário</th>
							<th>Tipo</th>
							<th>Criado em</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($retrieve as $item): ?>
						<tr class="odd gradeX">
							<td class="center"><?php echo $item->usu_usuario; ?></td>
							<td class="center"><?php echo $this->m_crud->get_rowSpecific('tb_pessoa', 'pes_id', $item->pes_id, 1, 'pes_nome'); ?></td>
							<td class="center"><?php echo $this->my_date->datetime($item->usu_criado, 'justDate'); ?></td>
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
