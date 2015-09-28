<!-- Right (content) side -->
<section class="content-block" role="main">

	<!-- Breadcrumbs -->
	<ul class="breadcrumb">
		<li><a href="#"><span class="awe-home"></span> Início</a></li>
		<li class="active">Aniversariantes</li>
		<li class="active">Aniversariantes do Mês</li>
	</ul>
	<!-- Breadcrumbs -->

	<h1><span class="awe-bolt"></span> Aniversariantes</h1>

	<!--
	***********************************************************************************************
	 AVISOS
	***********************************************************************************************
	-->




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
							<th>Nome</th>
							<th>Dia/Mês</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($retrieve as $item): ?>
						<tr class="odd gradeX">
							<td class="center"><?php echo $item->pes_nome; ?></td>
							<td class="center">
								<?php
									$date=date_create($item->pes_datanascimento);
									echo date_format($date,"d/m");
								?>
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
