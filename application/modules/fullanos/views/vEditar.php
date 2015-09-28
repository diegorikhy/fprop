<!-- Right (content) side -->
<section class="content-block" role="main">

    <!-- Breadcrumbs -->
    <ul class="breadcrumb">
        <li><a href="#"><span class="awe-home"></span> Gerenciador</a></li>
        <li class="active">Fullanos (Editar)</li>
    </ul>
    <!-- Breadcrumbs -->

    <h1><span class="awe-bolt"></span> Fullanos (Editar)</h1>

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

                <div class="tab-pane active" id="horizontal">

                    <?php echo form_fieldset('Formulário'); ?>
                    <?php echo form_open_multipart('fullanos/cFullanos/alterar/' . $ful_id, '') ?>

                    <div class="control-group">
                        <div class="controls">
                        <?php echo form_label('Nome', 'ful_nome', array('class' => 'control-label')); ?>
                        </div>
                            <?php echo form_input(array('id' => 'ful_nome', 'name' => 'ful_nome', 'class' => 'input-xlarge', 'value' => $ful_nome), set_value('ful_nome')); ?>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                        <?php echo form_label('Cargo', 'ful_cargo', array('class' => 'control-label')); ?>
                        </div>
                            <?php echo form_input(array('id' => 'ful_cargo', 'name' => 'ful_cargo', 'class' => 'input-xlarge', 'value' => $ful_cargo), set_value('ful_cargo')); ?>
                    </div>

                    <div class="control-group">
                        <?php echo form_label('Imagem', 'imagem'); ?>
                        <div class="controls">
                            <input type="file" name="userfile" size="20" />
                        </div>
                            <div><img src="<?php echo base_url() . 'uploads/fullanos/' . $ful_thumb; ?>" alt="" width="100px" /></div>
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







