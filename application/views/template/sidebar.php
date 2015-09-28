
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
      <li><a href="<?php echo base_url(); ?>" class="no-submenu" target="_blank">Visualizar Site</a></li>
      <li class="<?php echo ($current_module == 'configuracoesgerais' ? 'current' : ''); ?>"><a href="<?php echo base_url() . 'configuracoesgerais/cConfiguracoesgerais/editar' ?>" class="no-submenu">Configurações Gerais</a></li>
      <li class="<?php echo ($current_module == 'cases' ? 'current' : ''); ?>"><a href="<?php echo base_url() . 'cases/cCases/cadastrar' ?>" class="no-submenu">Cases</a></li>
      <li class="<?php echo ($current_module == 'clientes' ? 'current' : ''); ?>"><a href="<?php echo base_url() . 'clientes/cClientes/cadastrar' ?>" class="no-submenu">Clientes</a></li>
      <li class="<?php echo ($current_module == 'fullanos' ? 'current' : ''); ?>"><a href="<?php echo base_url() . 'fullanos/cFullanos/cadastrar' ?>" class="no-submenu">Fullanos</a></li>
      <li><a href="<?php echo base_url() . 'usuario/cUsuario/index/'; ?>" class="no-submenu">Usuários</a></li>
    </ul>
  </nav>
  <!-- /Main navigation -->
</section>
<!-- /Left (navigation) side -->
