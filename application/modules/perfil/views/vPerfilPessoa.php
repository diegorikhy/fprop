<!-- Right (content) side -->
<section class="content-block" role="main">

	<!-- Breadcrumbs -->
	<ul class="breadcrumb">
		<li><a href="#"><span class="awe-home"></span> Início</a></li>
		<li class="active">Pessoa</li>
		<li class="active">{Nome da Pessoa}</li>
	</ul>
	<!-- Breadcrumbs -->


	<!-- Page header -->
	<article class="page-header">
		<h1><?php echo "Colaborador"; ?></h1>
		<!--
		<p class="lead">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam blandit, dolor mollis adipiscing elementum, ipsum turpis euismod tellus, vitae mollis velit leo id nisi. Morbi non lectus turpis, eu interdum orci. In at rutrum nisi. Donec sit amet urna purus, at eleifend ipsum. Sed magna enim, tempor eu tincidunt vitae, dictum tristique arcu.
		</p>
		-->
	</article>
	<!-- /Page header -->

	<!-- Grid row -->
	<div class="row-fluid">

		<!-- Data block -->
		<article class="span4 data-block nested">
			<div class="data-container">
				<header>
					<h2><?php echo $dadosPessoa[0]->pes_apelido; ?></h2>
				</header>
				<section>
					<ul class="thumbnails">
						<li>
							<div class="thumbnail"><img src="<?php echo base_url() . 'uploads/pessoa/' . $dadosPessoa[0]->pes_foto; ?>" alt="foto perfil"></div>
						</li>
					</ul>
					<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam justo velit, eleifend nec adipiscing id, consequat ut augue. Pellentesque nec neque et leo ullamcorper pellentesque. Pellentesque aliquet iaculis velit sit amet vestibulum.</p> -->
				</section>
			</div>
		</article>
		<!-- /Data block -->

		<!-- Data block -->
		<article class="span8 data-block">

			<!--
			***
			***		INFORMAÇÕES GERAIS
			***
			-->
			<div class="data-container">
				<header>
					<h2>Informações Gerais</h2>
				</header>
				<section>
					<dl class="dl-horizontal">

						<dt>Nome Completo:</dt>
						<dd><?php echo $dadosPessoa[0]->pes_nome; ?></dd>

						<hr />

						<dt>Data Nascimento:</dt>
						<dd><?php echo $dadosPessoa[0]->pes_datanascimento . ' - {x} anos'; ?></dd>

						<hr />

						<dt>Nacionalidade:</dt>
						<dd><?php echo $dadosPessoa[0]->pes_nacionalidade; ?></dd>

						<hr />

						<dt>Naturalidade:</dt>
						<dd><?php echo $dadosPessoa[0]->pes_naturalidade; ?></dd>

						<hr />

						<dt>CPF:</dt>
						<dd><?php echo $dadosPessoa[0]->pes_cpf; ?></dd>

						<hr />

						<dt>RG:</dt>
						<dd><?php echo $dadosPessoa[0]->pes_rg . ' - ' . $dadosPessoa[0]->pes_rgorgaoexpedidor; ?></dd>

						<hr />

						<dt>Estado Civil</dt>
						<dd><?php echo $this->m_crud->get_rowSpecific('tb_estadocivil', 'est_id', $dadosPessoa[0]->pes_estadocivil, 1, 'est_titulo'); ?></dd>

						<hr />

						<dt>Formação Escolar:</dt>
						<dd><?php echo $this->m_crud->get_rowSpecific('tb_formacaoescolar', 'for_id', $dadosPessoa[0]->pes_formacaoescolar, 1, 'for_titulo'); ?></dd>

					</dl>
				</section>
			</div>

			<?php echo br(1); ?>

			<!--
			***
			***		TELEFONES
			***
			-->
			<div class="data-container">
				<header>
					<h2>Telefones</h2>
				</header>
				<section>
					<dl class="dl-horizontal">
						<?php
						$count_numero = 1;
						foreach ($dadosPessoa_telefones as $telefone):
						?>
						<dt>Número <?php echo $count_numero; ?>:</dt>
						<dd><?php echo $telefone->tel_telefone; ?></dd>
						<?php
						$count_numero++;
						echo "<hr />";
						endforeach;
						?>
					</dl>
				</section>
			</div>

			<?php echo br(2); ?>

			<!--
			***
			***		TELEFONES
			***
			-->
			<div class="data-container">
				<header>
					<h2>Endereços</h2>
				</header>
				<section>
					<dl class="dl-horizontal">

						<?php
							$count_endereco = 1;
							foreach ($dadosPessoa_endereco as $endereco):
						?>
						<dt><strong>Endereço <?php echo $count_endereco ?>:</strong></dt>
						<dd>
							Estado: <?php echo $this->m_crud->get_rowSpecific('tb_estados', 'cod_estados', $endereco->end_idestado, 1, 'nome'); ?>
							<br />
							Cidade: <?php echo $this->m_crud->get_rowSpecific('tb_cidades', 'cod_cidades', $endereco->end_idcidade, 1, 'nome'); ?>
							<br />
							CEP: <?php echo $endereco->end_cep; ?>
							<br />
							Logradouro: <?php echo $endereco->end_logradouro . ' Nº ' . $endereco->end_numero . ' Quadra ' . $endereco->end_quadra . ' Lote ' . $endereco->end_lote . ' Bairro ' . $endereco->end_bairro ; ?>
							<br />
							Complemento: <?php echo $endereco->end_complemento; ?>
							<br />
						</dd>
						<?php $count_endereco++; ?>
						<?php echo br(1); ?> <hr />
						<?php endforeach; ?>
					</dl>
				</section>
			</div>


			<?php echo br(2); ?>

			<!--
			***
			***		TELEFONES
			***
			-->
			<div class="data-container">
				<header>
					<h2>E-mails</h2>
				</header>
				<section>
					<dl class="dl-horizontal">

						<?php
							$count_email = 1;
							foreach ($dadosPessoa_email as $email):
						?>
						<dt><strong>Email <?php echo $count_email ?>:</strong></dt>
						<dd>
							<?php echo $email->ema_email; ?>
							<br />
						</dd>
						<?php $count_email++; ?>
						<?php echo br(1); ?> <hr />
						<?php endforeach; ?>
					</dl>
				</section>
			</div>

		</article>
		<!-- /Data block -->

	</div>
	<!-- /Grid row -->


</section>
<!-- /Right (content) side -->
