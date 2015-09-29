<!-- Right (content) side -->
<section class="content-block" role="main">

  <!-- Breadcrumbs -->
  <ul class="breadcrumb">
    <li><a href="#"><span class="awe-home"></span> Gerenciador</a></li>
    <li class="active">Cases de Sucesso - Miniatura</li>
  </ul>
  <!-- Breadcrumbs -->

  <h1><span class="awe-bolt"></span> Cases de Sucesso - Miniatura</h1>
  <?php include("avisos.php"); ?>

  <!-- Grid row -->
  <div class="row-fluid">

    <!-- Data block -->
    <article class="span12 data-block nested">
      <div class="data-container">
        <header>
          <h2>Inserir miniatura para "<?php echo $cas_titulo; ?>"</h2>
        </header>

        <!-- Example horizontal forms -->
        <div class="tab-pane active" id="horizontal">

          <?php echo form_open_multipart('cases/cCases/gravarMiniatura/' . $cas_id, '') ?>
          <?php echo form_fieldset('Formulário'); ?>

          <div style="padding: 0 0 30px; font-size: 16px;">A miniatura deve ter 450px de largura e 220px de altura!</div>

          <div class="control-group">
            <?php echo form_label('Título', 'cas_titulo', array('class' => 'control-label')); ?>
            <div class="controls">
              <?php echo form_input(array('id' => 'cas_titulo', 'name' => 'cas_titulo', 'class' => 'input-xlarge', 'value' => $cas_titulo), set_value('cas_titulo')); ?>
            </div>
          </div>

          <div class="control-group">
            <?php echo form_label('Miniatura', 'imagem'); ?>
            <div class="controls">
              <input type="file" name="userfile" size="20" />
              <?php if ($cas_foto != '') : ?>
              <div><img src="<?php echo base_url() . 'uploads/cases/' . $cas_foto; ?>" alt="" width="100px" /></div>
              <?php endif; ?>
            </div>
          </div>

          <!-- SALVAR -->
          <div class="form-actions">
            <button class="btn btn-alt btn-large btn-primary" type="submit">Salvar</button>
            <a class="btn btn-alt btn-large" href="<?php echo base_url() . $voltar; ?>">Voltar</a>
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

</section>
<!-- /Right (content) side -->







