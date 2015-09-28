<!-- Right (content) side -->
<section class="content-block" role="main">

  <!-- Breadcrumbs -->
  <ul class="breadcrumb">
    <li><a href="#"><span class="awe-home"></span> Gerenciador</a></li>
    <li class="active">Cases de Sucesso (Editar)</li>
  </ul>
  <!-- Breadcrumbs -->

  <h1><span class="awe-bolt"></span> Cases de Sucesso (Editar)</h1>

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
          <h2>Editar Item</h2>
        </header>

        <!-- Example horizontal forms -->
        <div class="tab-pane active" id="horizontal">

          <?php echo form_open_multipart('cases/cCases/alterar/' . $cas_id, '') ?>
          <?php echo form_fieldset('Formulário'); ?>

          <div class="control-group">
            <?php echo form_label('Título', 'cas_titulo', array('class' => 'control-label')); ?>
            <div class="controls">
              <?php echo form_input(array('id' => 'cas_titulo', 'name' => 'cas_titulo', 'class' => 'input-xlarge', 'value' => $cas_titulo), set_value('cas_titulo')); ?>
            </div>
          </div>

          <div class="control-group">
          <?php echo form_label('Ordem', 'cas_ordem', array('class' => 'control-label')); ?>
            <div class="controls">
            <?php echo form_input(array('id' => 'cas_ordem', 'name' => 'cas_ordem', 'class' => 'input-xlarge', 'value' => $cas_ordem), set_value('cas_ordem')); ?>
            </div>
          </div>

          <div class="control-group">
            <?php echo form_label('Imagem', 'imagem'); ?>
            <div class="controls">
              <input type="file" name="userfile" size="20" />
              <div><img src="<?php echo base_url() . 'uploads/cases/' . $cas_thumb; ?>" alt="" width="100px" /></div>
            </div>
          </div>

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







