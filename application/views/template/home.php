
<!-- Left (navigation) side -->
<section class="navigation-block">

<!-- Main page header -->
<header>

	<!-- Main page logo -->
	<h1><a class="brand" href="login.html"></a></h1>

	<!-- Main page headline -->
	<p class="center">Painel de Administração</p>

</header>
<!-- /Main page header -->

<!-- User profile -->
<section class="user-profile">
	<figure>
		<figcaption>
			<strong><a href="#" class=""><?php echo $usuario; ?></a></strong>
			<em><?php echo $departamento; ?></em>
			<ul>
				<li><a class="btn btn-primary btn-flat" href="<?php echo base_url() . 'login/cLogin/logout/' ?>" title="Sair da Administração">Sair</a></li>
			</ul>
		</figcaption>
	</figure>
</section>
<!-- /User profile -->

<!-- Responsive navigation -->
<a href="#" class="btn btn-navbar btn-large" data-toggle="collapse" data-target=".nav-collapse"><span class="fam-house"></span> Dashboard</a>



<!-- Main navigation -->
<nav class="main-navigation nav-collapse" role="navigation">
	<ul>

		<!--
		-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
		MENU - COLABORADOR
		-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
		-->
		<?php if($permissao == '1'): ?>

		<!-- VISUALIZAR SITE -->
		<li><a href="<?php echo base_url(); ?>" class="no-submenu" target="_blank"><span class=""></span>Visualizar Site</a></li>

		<!-- CONFIGURAÇÕES GERAIS -->
		<li class="<?php echo ($current_module == 'configuracoesgerais' ? 'current' : ''); ?>"><a href="<?php echo base_url() . 'configuracoesgerais/cConfiguracoesgerais/editar' ?>" class="no-submenu"><span class="icon-configuracoesgerais"></span>Configurações Gerais</a></li>

		<!-- CASA ABERTA -->
		<li class="<?php echo ($current_module == 'casaaberta' ? 'current' : ''); ?>"><a href="<?php echo base_url() . 'casaaberta/cCasaaberta/cadastrar/' ?>" class="no-submenu"><span class="icon-casaaberta"></span>Casa Aberta</a></li>

		<!-- BANNER ROTATIVO -->
		<li class="<?php echo ($current_module == 'slideshow' ? 'current' : ''); ?>">
			<a href="#"><span class="icon-banner"></span>Banner Rotativo</a>
			<ul>
				<li><a href="<?php echo base_url() . 'slideshow/cHome/cadastrar/' ?>">Home</a></li>
				<li><a href="<?php echo base_url() . 'slideshow/cInternas/cadastrar/' ?>">Internas</a></li>
			</ul>
		</li>

		<!-- A VIVANCI -->
		<li class="<?php echo ($current_module == 'avivanci' ? 'current' : ''); ?>">
			<a href="<?php echo base_url() . 'avivanci/cAvivanci/editar/'; ?>" class="no-submenu">
				<span class="-fornecedores"></span>A Vivanci
			</a>
		</li>

		<!-- BLOG -->
		<li class="<?php echo ($current_module == 'blog' ? 'current' : ''); ?>">
			<a href="#"><span class="-clientes"></span>Blog</a>
			<ul>
				<li><a href="<?php echo base_url() . 'blog/cHome/cadastrar/' ?>">Home</a></li>
				<li><a href="<?php echo base_url() . 'blog/cInternas/cadastrar/' ?>">Internas</a></li>
			</ul>
		</li>

		<!-- IMÓVEIS -->
		<li class="<?php echo ($current_module == 'imoveis' ? 'current' : ''); ?>"><a href="<?php echo base_url() . 'imoveis/cImoveis/editar/'; ?>" class="no-submenu"><span class="icon-imoveis"></span>Imóveis</a></li>

		<!-- NEWSLETTER -->
		<li class="<?php echo ($current_module == 'newsletter' ? 'current' : ''); ?>"><a href="<?php echo base_url() . 'newsletter/cNewsletter/editar/'; ?>" class="no-submenu"><span class="icon-newsletter"></span>Imóveis</a></li>



		<?php endif; ?>


		<!--
		-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
		MENU - ADMINISTRADOR
		-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
		-->
		<?php if($permissao == '2'): ?>

		<li><a href="<?php echo base_url() . 'departamento/cDepartamento/index/'; ?>" class="no-submenu"><span class="departamento"></span>Departamentos</a></li>
		<li><a href="<?php echo base_url() . 'usuario/cUsuario/index/'; ?>" class="no-submenu"><span class="-usuarios"></span>Usuários</a></li>
		<li><a href="#"><span class="-colaboradores"></span>Pessoas</a>
			<ul>
				<li><a href="<?php echo base_url() . 'pessoa/cPessoa/cadastrar/' ?>">Nova Pessoa</a></li>
				<li><a href="<?php echo base_url() . 'pessoa/cPessoa/listarPessoas/' ?>">Gerenciar</a></li>
			</ul>
		</li>

		<!-- FORNECEDORES -->
		<li class="<?php echo ($current_module == 'fornecedor' ? 'current' : ''); ?>">
			<a href="<?php echo base_url() . 'fornecedores/cFornecedorAdministrador/cadastrar/'; ?>" class="no-submenu">
				<span class="-fornecedores"></span>
				Fornecedores
			</a>
		</li>

		<!-- CLIENTES -->
		<li class="<?php echo ($current_module == 'cliente' ? 'current' : ''); ?>">
			<a href="#"><span class="-clientes"></span>Clientes</a>
			<ul>
				<li><a href="<?php echo base_url() . 'clientes/cClienteAdministrador/cadastrarCategoria/' ?>">Gerenciar Categorias</a></li>
				<li><a href="<?php echo base_url() . 'clientes/cClienteAdministrador/cadastrarCliente/' ?>">Gerenciar Clientes</a></li>
			</ul>
		</li>

		<!-- METAS -->
		<li class="<?php echo ($current_module == 'metas' ? 'current' : ''); ?>">
			<a href="<?php echo base_url() . 'metas/cMetasAdministrador/cadastrar/'; ?>" class="no-submenu">
				<span class="-fornecedores"></span>
				Metas
			</a>
		</li>

		<!-- OBJETIVOS -->
		<li class="<?php echo ($current_module == 'objetivos' ? 'current' : ''); ?>">
			<a href="<?php echo base_url() . 'objetivos/cObjetivosAdministrador/cadastrar/'; ?>" class="no-submenu">
				<span class="fam-objetivos"></span>
				Objetivos
			</a>
		</li>

		<!-- TV ENERWATT -->
		<li class="<?php echo ($current_module == 'tvenerwatt' ? 'current' : ''); ?>">
			<a href="<?php echo base_url() . 'tvenerwatt/cTvenerwattAdministrador/cadastrar/'; ?>" class="no-submenu">
				<span class="fam-tvenerwatt"></span>
				TV Enerwatt
			</a>
		</li>


		<?php endif; ?>


	</ul>
</nav>
<!-- /Main navigation -->

</section>
<!-- /Left (navigation) side -->
