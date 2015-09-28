<!-- Right (content) side -->
<section class="content-block" role="main">

  <!-- Breadcrumbs -->
  <ul class="breadcrumb">
    <li><a href="#"><span class="awe-home"></span> Gerenciador</a></li>
    <li class="active">Clientes</li>
  </ul>
  <!-- Breadcrumbs -->

  <h1><span class="awe-bolt"></span> Clientes</h1>

    <!--
    ***********************************************************************************************
     AVISOS
    ***********************************************************************************************
  -->
  <?php include("avisos.php"); ?>


  <!-- Grid row -->
  <div class="row-fluid">

    <!-- Data block -->
    <article class="span12 data-block nested">
      <div class="data-container">
        <header>
          <h2>Inserir Novo Item</h2>
        </header>

        <!-- Example horizontal forms -->
        <!-- Tab #horizontal -->
        <div class="tab-pane active" id="horizontal">

          <?php echo form_open_multipart('clientes/cClientes/gravar/', '') ?>
          <?php echo form_fieldset('Formulário'); ?>

          <div class="control-group">
            <?php echo form_label('URL', 'cli_url', array('class' => 'control-label')); ?>
            <div class="controls">
              <?php echo form_input(array('id' => 'cli_url', 'name' => 'cli_url', 'class' => 'input-xlarge'), set_value('cli_url')); ?>
            </div>
          </div>

          <div class="control-group">
            <span style="color: #777; font-size: 12px;">
            Obs.: A imagem deve estar em escala de cinza com a tonalidade em #7F7F7F ou rgb(127, 127, 127)<br>
            A dimensão da imagem deve ser 280px X 100px
            </span>
          </div>

          <div class="control-group">
            <?php echo form_label('Imagem', 'imagem'); ?>
            <div class="controls">
              <input type="file" name="userfile" size="20" />
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
        <h2>Listagem de Itens</h2>
      </header>
      <section>

        <table class="datatable table table-striped table-bordered table-hover" id="dataTable_departamentos">
          <thead>
            <tr>
              <th>URL</th>
              <th>Thumb</th>
              <th>Criado em</th>
              <th>Última Modificação</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($retrieve as $item): ?>
              <tr class="odd gradeX">
                <td class="center"><?php echo $item->cli_url; ?></td>
                <td class="center"><img src="<?php echo base_url() . 'uploads/clientes/' . $item->cli_thumb; ?>" width="100px" /></td>
                <td class="center"><?php echo $this->my_date->datetime($item->criado, 'justDate'); ?></td>
                <td class="center"><?php echo $this->my_date->datetime($item->modificado, 'justDate'); ?></td>
                <td>
                  <div class="btn-group-datatable">
                    <a href="<?php echo base_url() . 'clientes/cClientes/editar/' . $item->cli_id; ?>" class="btn btn-small"><span class="icon-pencil"></span></a>
                    <a href="<?php echo base_url() . 'clientes/cClientes/deletar/' . $item->cli_id; ?>" class="btn btn-small"><span class="icon-trash"></span></a>
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







