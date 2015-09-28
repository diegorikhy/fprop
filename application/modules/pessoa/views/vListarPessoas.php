<!-- Right (content) side -->
<section class="content-block" role="main">

	<!-- Breadcrumbs -->
	<ul class="breadcrumb">
		<li><a href="#"><span class="awe-home"></span> Início</a></li>
		<li class="active">Módulo: Pessoa</li>
		<li class="active">Listagem de Pessoas</li>
	</ul>
	<!-- Breadcrumbs -->

	<h1><span class="awe-bolt"></span> Pessoa</h1>

	<!--
	***********************************************************************************************
	 AVISOS
	***********************************************************************************************
	-->
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
	@ AVISO: ERRO NA DELEÇÃO DO REGISTRO
	-->
	<?php if($this->session->flashdata('falhaDelecaoDoRegistro')): ?>
	<div class="alert alert-error fade in">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Erro!</strong> <?php echo $this->session->flashdata('falhaDelecaoDoRegistro'); ?>
	</div>
	<?php endif; ?>



	<!-- Grid row -->
	<div class="row-fluid">

		<!-- Data block -->
		<article class="span12 dark data-block">
			<header>
				<h2>Listagem de Pessoas</h2>
				<ul class="data-header-actions">
					<li>

						<!-- DataTable column filter -->
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Filtrar por Coluna</a>
						<ul class="dropdown-menu datatable-controls">
							<li><label class="checkbox" for="dt_col_1"><input type="checkbox" value="0" id="dt_col_1" name="toggle-cols" checked="checked"> ID</label></li>
							<li><label class="checkbox" for="dt_col_2"><input type="checkbox" value="1" id="dt_col_2" name="toggle-cols" checked="checked"> Nome</label></li>
							<li><label class="checkbox" for="dt_col_3"><input type="checkbox" value="2" id="dt_col_3" name="toggle-cols" checked="checked"> Foto</label></li>
							<li><label class="checkbox" for="dt_col_4"><input type="checkbox" value="3" id="dt_col_4" name="toggle-cols" checked="checked"> Departamento</label></li>
							<li><label class="checkbox" for="dt_col_4"><input type="checkbox" value="3" id="dt_col_4" name="toggle-cols" checked="checked"> CPF</label></li>
							<li><label class="checkbox" for="dt_col_4"><input type="checkbox" value="3" id="dt_col_4" name="toggle-cols" checked="checked"> Ações</label></li>
							<li><label class="checkbox" for="dt_col_4"><input type="checkbox" value="3" id="dt_col_4" name="toggle-cols" checked="checked"> Detalhes</label></li>
						</ul>
						<!-- /DataTable column filter -->

					</li>
				</ul>
			</header>
			<section>

				<table class="datatable table table-striped table-bordered table-hover" id="dataTable_departamentos">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Foto</th>
							<th>Departamento</th>
							<th>CPF</th>
							<th>Ações</th>
							<th>Detalhes</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($retrieve as $item): ?>
						<tr class="odd gradeX">
							<td class="center"><?php echo $item->pes_nome; ?></td>
							<td class="center thumbnail"><img src="<?php echo base_url() . 'uploads/pessoa/' . $item->pes_foto; ?>" width="50" height="50" /></td>
							<td class="center"><?php echo $this->m_crud->get_rowSpecific('tb_departamento', 'dep_id', $item->dep_id, 1, 'dep_nome'); ?></td>
							<td class="center"><?php echo $item->pes_cpf; ?></td>
							<td style="text-align:left;">
								<div class="btn-group floatLeft" style="width:100%;">
									<button class="btn dropdown-toggle" data-toggle="dropdown" style="width:100%;">Ações <span class="caret"></span></button>
									<ul class="dropdown-menu">
										<li><a href="#">Endereços</a></li>
										<li><a href="#">Telefones</a></li>
										<li><a href="#">E-mails</a></li>
										<li class="divider"></li>
										<li><a href="#">Desativar Pessoa</a></li>
									</ul>
								</div>
							</td>
							<td>
								<div class="btn-group-datatable">
									<a href="<?php echo base_url() . 'uploads/departamento/' . $item->pes_id; ?>" class="btn btn-small" rel="lightbox"><span class="icon-eye-open"></span></a>
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
