<!-- Right (content) side -->
<section class="content-block" role="main">

    <!-- Breadcrumbs -->
    <ul class="breadcrumb">
        <li><a href="#"><span class="awe-home"></span> Gerenciador</a></li>
        <li class="active">Teste</li>
    </ul>
    <!-- Breadcrumbs -->

    <h1><span class="awe-bolt"></span> Teste</h1>

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

                    <?php echo form_open('teste/cTeste/alterar/', 'class="form-horizontal"'); ?>					

                    <?php echo form_fieldset('Formulário'); ?>

                    <!-- TITULO -->
                    <div class="control-group">
                        <?php echo form_label('Titulo', 'tes_titulo', array('class' => 'control-label')); ?>
                        <div class="controls">
                            <?php echo form_input(array('id' => 'tes_titulo', 'name' => 'tes_titulo', 'class' => 'input-xlarge', 'value' => $tes_titulo), set_value('tes_titulo')); ?>
                        </div>
                    </div>

                    <!-- CATEGORIA -->
                    <div class="control-group">
                        <?php echo form_label('Categoria', 'cat_titulo', array('class' => 'control-label')); ?>
                        <div class="controls">
                            <?php echo form_dropdown('cat_id', $categorias); ?>
                        </div>
                    </div>


                    <!-- POSIÇÃO -->
                    <!-- NUMBER -->
                    <div class="control-group">
                        <?php echo form_label('Categoria', 'cat_titulo', array('class' => 'control-label')); ?>
                        <div class="controls">
                            <?php echo form_input(array('id' => 'sli_posicao', 'name' => 'sli_posicao', 'min' => '1', 'max' => '999', 'type' => 'number', 'style' => 'width:40px;text-align:center;'), set_value('sli_posicao')); ?>
                        </div>
                    </div>

                    <!-- FALE CONOSCO RODAPÉ -->
                    <div class="control-group">
                        <?php echo form_label('Fale Conosco - Rodapé', 'con_faleconoscorodape', array('class' => 'control-label')); ?>
                        <div class="controls">
                            <textarea id="textarea4" class="wysihtml5" name="con_faleconoscorodape" placeholder="Enter text&hellip;" rows="8"><?php echo $con_faleconoscorodape; ?></textarea>
                        </div>
                    </div>




                    <!-- SALVAR -->
                    <div class="form-actions">
                        <button class="btn btn-alt btn-large btn-primary" type="submit">Editar</button>
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