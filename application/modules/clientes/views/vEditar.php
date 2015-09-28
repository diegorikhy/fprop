<!-- Right (content) side -->
<section class="content-block" role="main">

  <!-- Breadcrumbs -->
  <ul class="breadcrumb">
    <li><a href="#"><span class="awe-home"></span> Gerenciador</a></li>
    <li class="active">Clientes (Editar)</li>
  </ul>
  <!-- Breadcrumbs -->

  <h1><span class="awe-bolt"></span> Clientes (Editar)</h1>

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
        <!-- Tab #horizontal -->
        <div class="tab-pane active" id="horizontal">

          <?php echo form_open_multipart('clientes/cClientes/alterar/' . $cli_id, '') ?>
          <?php echo form_fieldset('Formulário'); ?>

          <div class="control-group">
            <?php echo form_label('URL', 'cli_url', array('class' => 'control-label')); ?>
            <div class="controls">
              <?php echo form_input(array('id' => 'cli_url', 'name' => 'cli_url', 'class' => 'input-xlarge', 'value' => $cli_url), set_value('cli_url')); ?>
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
              <div><img src="<?php echo base_url() . 'uploads/clientes/' . $cli_thumb; ?>" alt="" width="100px" /></div>
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







