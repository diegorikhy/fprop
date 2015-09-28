<!-- Right (content) side -->
<section class="content-block" role="main">

    <!-- Breadcrumbs -->
    <ul class="breadcrumb">
        <li><a href="#"><span class="awe-home"></span> Início</a></li>
        <li class="active">Pessoa</li>
    </ul>
    <!-- Breadcrumbs -->


    <!-- Page header -->
    <article class="page-header">
        <h1>Colaboradores</h1>
    </article>
    <!-- /Page header -->



    <!-- Grid row -->
    <div class="row-fluid">

        <!-- Data block -->
        <article class="span12 dark data-block">
            <header>
                <h2>Listagem de Colaboradores</h2>
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
                            <th>Foto</th>
                            <th>Departamento</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($retrieve as $item): ?>
                            <tr class="odd gradeX">
                                <td class="center"><?php echo $item->pes_nome; ?></td>
                                <td class="center thumbnail"><img src="<?php echo base_url() . 'uploads/pessoa/' . $item->pes_foto; ?>" style="max-width:100px;" /></td>
                                <td class="center"><?php echo $this->m_crud->get_rowSpecific('tb_departamento', 'dep_id', $item->dep_id, 1, 'dep_nome'); ?></td>
                                <td>
                                    <div class="btn-group-datatable">
                                        <a href="<?php echo base_url() . 'perfil/cPerfilUsuario/perfilPessoa/' . $item->pes_id; ?>" class="btn btn-small"><span class="icon-eye-open"></span></a>
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
