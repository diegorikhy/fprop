<!-- 
@ AVISO: SUCESSO
-->
<?php if ($this->session->flashdata('registroInseridoComSucesso')): ?>
    <script>
        jQuery(document).ready(function() {
            $.jGrowl("<?php echo $this->session->flashdata('registroInseridoComSucesso'); ?> ", {
                header: 'Sucesso!',
                theme: 'success',
                sticky: true,
            });
        });
    </script>
<?php endif; ?>

<!-- 
@ AVISO: EDITAR SUCESSO
-->
<?php if ($this->session->flashdata('registroEditadoComSucesso')): ?>
    <script>
        jQuery(document).ready(function() {
            $.jGrowl("<?php echo $this->session->flashdata('registroEditadoComSucesso'); ?> ", {
                header: 'Sucesso!',
                theme: 'success',
                sticky: true,
            });
        });
    </script>
<?php endif; ?>

<!-- 
@ AVISO: DELETAR SUCESSO
-->
<?php if ($this->session->flashdata('registroDeletadoComSucesso')): ?>
    <script>
        jQuery(document).ready(function() {
            $.jGrowl("<?php echo $this->session->flashdata('registroDeletadoComSucesso'); ?> ", {
                header: 'Sucesso!',
                theme: 'success',
                sticky: true,
            });
        });
    </script>
<?php endif; ?>

<!-- 
@ AVISO: ERRO NA INSERÇÃO
-->
<?php if ($this->session->flashdata('falhaInsercaoDoRegistro')): ?>
    <script>
        jQuery(document).ready(function() {
            $.jGrowl("<?php echo $this->session->flashdata('falhaInsercaoDoRegistro'); ?>", {
                header: 'Erro!',
                theme: 'warning',
                sticky: true,
            });
        });
    </script>
<?php endif; ?>

<!-- 
@ AVISO: ERRO NA VALIDAÇÃO DO FORMULÁRIO
-->
<?php if ($this->session->flashdata('erroValidacaoFormulario')): ?>
    <script>
        jQuery(document).ready(function() {
            $.jGrowl("Falha na validação do formulário!", {
                header: 'Erro!',
                theme: 'warning',
                sticky: true,
            });
        });
    </script>
<?php endif; ?>

<!-- 
@ AVISO: ERRO UPLOAD IMAGEM
-->
<?php if ($this->session->flashdata('erroUploadImagem')): ?>
    <script>
        jQuery(document).ready(function() {
            $.jGrowl("Ocorreu um erro no envio da imagem!", {
                header: 'Erro!',
                theme: 'warning',
                sticky: true,
            });
        });
    </script>
<?php endif; ?>

<!-- 
@ AVISO: ERRO UPLOAD IMAGEM
-->
<?php if ($this->session->flashdata('erroUpload')): ?>
    <script>
        jQuery(document).ready(function() {
            $.jGrowl("Ocorreu um erro no envio do arquivo!", {
                header: 'Erro!',
                theme: 'warning',
                sticky: true,
            });
        });
    </script>
<?php endif; ?>

<!-- 
@ AVISO: ERRO NA DELEÇÃO DO REGISTRO
-->
<?php if ($this->session->flashdata('falhaDelecaoDoRegistro')): ?>
    <script>
        jQuery(document).ready(function() {
            $.jGrowl("Não foi possível deletar o registro. <br /> Tente novamente!", {
                header: 'Erro!',
                theme: 'warning',
                sticky: true,
            });
        });
    </script>
<?php endif; ?>
