<!-- Right (content) side -->
<section class="content-block" role="main">

  <!-- Breadcrumbs -->
  <ul class="breadcrumb">
    <li><a href="#"><span class="awe-home"></span> Gerenciador</a></li>
    <li class="active">Cases de Sucesso</li>
  </ul>
  <!-- Breadcrumbs -->

  <h1><span class="awe-bolt"></span> Cases de Sucesso</h1>
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
        <div class="tab-pane active" id="horizontal">

          <?php echo form_open_multipart('cases/cCases/gravar/', '') ?>
          <?php echo form_fieldset('Formulário'); ?>

          <div class="control-group">
            <?php echo form_label('Título', 'cas_titulo', array('class' => 'control-label')); ?>
            <div class="controls">
              <?php echo form_input(array('id' => 'cas_titulo', 'name' => 'cas_titulo', 'class' => 'input-xlarge'), set_value('cas_titulo')); ?>
            </div>
          </div>

          <div class="control-group">
            <?php echo form_label('URL do Vídeo', 'cas_video', array('class' => 'control-label')); ?>
            <div class="controls">
              <?php echo form_input(array('id' => 'cas_video', 'name' => 'cas_video', 'class' => 'input-xlarge'), set_value('cas_video')); ?>
            </div>
          </div>

          <div class="control-group">
            <?php echo form_label('Ordem', 'cas_ordem', array('class' => 'control-label')); ?>
            <div class="controls">
              <?php echo form_input(array('id' => 'cas_ordem', 'name' => 'cas_ordem', 'class' => 'input-xlarge'), set_value('cas_ordem')); ?>
            </div>
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
              <th>Ordem</th>
              <th>Título</th>
              <th>Thumb</th>
              <th>Miniatura</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($retrieve as $item): ?>
              <tr class="odd gradeX">
                <td class="center"><?php echo $item->cas_ordem; ?></td>
                <td class="center"><?php echo $item->cas_titulo; ?></td>
                <td class="center"><img src="<?php echo base_url() . 'uploads/cases/' . $item->cas_thumb; ?>" width="100px" /></td>
                <td class="center">
                  <?php if($item->cas_foto != ''): ?>
                    <img src="<?php echo base_url() . 'uploads/cases/' . $item->cas_foto; ?>" width="100px" />
                  <?php endif; ?>
                </td>
                <td>
                  <div class="btn-group-datatable">
                    <a href="<?php echo base_url() . 'cases/cCases/cadastrarMiniatura/' . $item->cas_id; ?>" class="btn btn-small"><span class="icon-picture"></span> Miniatura</a>
                    <a href="<?php echo base_url() . 'cases/cCases/editar/' . $item->cas_id; ?>" class="btn btn-small"><span class="icon-pencil"></span></a>
                    <a href="<?php echo base_url() . 'cases/cCases/deletar/' . $item->cas_id; ?>" class="btn btn-small"><span class="icon-trash"></span></a>
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







