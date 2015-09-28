<!-- Right (content) side -->
<section class="content-block" role="main">

  <!-- Breadcrumbs -->
  <ul class="breadcrumb">
    <li><a href="#"><span class="awe-home"></span> Gerenciador</a></li>
    <li class="active">Configurações Gerais</li>
  </ul>
  <!-- Breadcrumbs -->

  <h1><span class="awe-bolt"></span> Configurações Gerais</h1>

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

          <?php echo form_open('configuracoesgerais/cConfiguracoesgerais/alterar/1', 'class="form-horizontal"'); ?>

            <?php echo form_fieldset('Formulário'); ?>

              <!-- EMAIL -->
              <div class="control-group">
                <?php echo form_label('E-mail', 'con_email', array('class'=>'control-label')); ?>
                <div class="controls">
                  <?php echo form_input(array('id'=>'con_email', 'name'=>'con_email', 'class'=>'input-xlarge', 'value'=>$con_email), set_value('con_email')); ?>
                </div>
              </div>

              <!-- TELEFONE -->
              <div class="control-group">
                <?php echo form_label('Telefone', 'con_telefone', array('class'=>'control-label')); ?>
                <div class="controls">
                  <?php echo form_input(array('id'=>'con_telefone', 'name'=>'con_telefone', 'class'=>'input-xlarge', 'value'=>$con_telefone), set_value('con_telefone')); ?>
                </div>
              </div>

              <!-- ENDERECO -->
              <div class="control-group hide">
                <?php echo form_label('Endereço', 'con_endereco', array('class'=>'control-label')); ?>
                <div class="controls">
                  <?php echo form_input(array('id'=>'con_endereco', 'name'=>'con_endereco', 'class'=>'input-xlarge', 'value'=>$con_endereco), set_value('con_endereco')); ?>
                </div>
              </div>

              <!-- COORDENADA X -->
              <div class="control-group">
                <?php echo form_label('Coordenada X', 'con_coordenadax', array('class'=>'control-label')); ?>
                <div class="controls">
                  <?php echo form_input(array('id'=>'con_coordenadax', 'name'=>'con_coordenadax', 'class'=>'input-xlarge', 'value'=>$con_coordenadax), set_value('con_coordenadax')); ?>
                </div>
              </div>

              <!-- COORDENADA Y -->
              <div class="control-group">
                <?php echo form_label('Coordenada Y', 'con_coordenaday', array('class'=>'control-label')); ?>
                <div class="controls">
                  <?php echo form_input(array('id'=>'con_coordenaday', 'name'=>'con_coordenaday', 'class'=>'input-xlarge', 'value'=>$con_coordenaday), set_value('con_coordenaday')); ?>
                </div>
              </div>

              <!-- URL VIDEO -->
              <div class="control-group">
                <?php echo form_label('URL Vídeo', 'con_urlvideo', array('class'=>'control-label')); ?>
                <div class="controls">
                  <?php echo form_input(array('id'=>'con_urlvideo', 'name'=>'con_urlvideo', 'class'=>'input-xlarge', 'value'=>$con_urlvideo), set_value('con_urlvideo')); ?>
                </div>
              </div>

              <div class="control-group">
                <?php echo form_label('Facebook', 'con_facebook', array('class'=>'control-label')); ?>
                <div class="controls">
                  <?php echo form_input(array('id'=>'con_facebook', 'name'=>'con_facebook', 'class'=>'input-xlarge', 'value'=>$con_facebook), set_value('con_facebook')); ?>
                </div>
              </div>

              <div class="control-group">
                <?php echo form_label('Instagram', 'con_twitter', array('class'=>'control-label')); ?>
                <div class="controls">
                  <?php echo form_input(array('id'=>'con_twitter', 'name'=>'con_twitter', 'class'=>'input-xlarge', 'value'=>$con_twitter), set_value('con_twitter')); ?>
                </div>
              </div>

              <!-- SALVAR -->
              <div class="form-actions">
                <button class="btn btn-alt btn-large btn-primary" type="submit">Salvar alterações</button>
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
