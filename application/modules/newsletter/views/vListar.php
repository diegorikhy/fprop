<!-- Right (content) side -->
<section class="content-block" role="main">

	<!-- Breadcrumbs -->
	<ul class="breadcrumb">
		<li><a href="#"><span class="awe-home"></span> Gerenciador</a></li>
		<li class="active">Boletim Informativo</li>
	</ul>
	<!-- Breadcrumbs -->

	<h1><span class="awe-bolt"></span> Boletim Informativo</h1>

	<!--
	***********************************************************************************************
	 AVISOS
	***********************************************************************************************
	-->
	<?php include("avisos.php"); ?>


	<!-- Grid row -->
	<div class="row-fluid">

		<!-- Data block -->
		<article class="span12 dark data-block">
			<header>
				<h2>Listagem de Itens</h2>
			</header>
			<section>

				<table class="datatable table table-striped table-bordered table-hover" id="dataTable_departamentos">
					<thead>
						<tr>
							<th>E-mail</th>
							<th>Criado em</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($retrieve as $item): ?>
						<tr class="odd gradeX">
							<td class="center"><?php echo $item->new_email; ?></td>
							<td class="center"><?php echo $this->my_date->datetime($item->criado, 'justDate'); ?></td>
							<td class="center"><?php echo $this->my_date->datetime($item->modificado, 'justDate'); ?></td>
							<td>
								<div class="btn-group-datatable">
									<a href="<?php echo base_url() . 'newsletter/cNewsletter/deletar/' . $item->new_id; ?>" class="btn btn-small"><span class="icon-trash"></span></a>
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







