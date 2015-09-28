	<!-- 
	@ AVISO: SUCESSO
	-->
	<?php if($this->session->flashdata('registroInseridoComSucesso')): ?>
	<div class="alert alert-success fade in">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Sucesso!</strong> <?php echo $this->session->flashdata('registroInseridoComSucesso'); ?>
	</div>
	<?php endif; ?>
	

	<!-- 
	@ AVISO: EDITAR SUCESSO
	-->
	<?php if($this->session->flashdata('registroEditadoComSucesso')): ?>
	<div class="alert alert-success fade in">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Sucesso!</strong> <?php echo $this->session->flashdata('registroEditadoComSucesso'); ?>
	</div>
	<?php endif; ?>
	

	<!-- 
	@ AVISO: DELETADO SUCESSO
	-->
	<?php if($this->session->flashdata('registroDeletadoComSucesso')): ?>
	<div class="alert alert-success fade in">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Sucesso!</strong> <?php echo $this->session->flashdata('registroDeletadoComSucesso'); ?>
	</div>
	<?php endif; ?>


	<!-- 
	@ AVISO: ERRO NA INSERÇÃO
	-->
	<?php if($this->session->flashdata('falhaInsercaoDoRegistro')): ?>
	<div class="alert alert-error fade in">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Erro!</strong> <?php echo $this->session->flashdata('falhaInsercaoDoRegistro'); ?>
	</div>
	<?php endif; ?>


	<!-- 
	@ AVISO: ERRO NA DELEÇÃO DO REGISTRO
	-->
	<?php if($this->session->flashdata('falhaDelecaoDoRegistro')): ?>
	<div class="alert alert-error fade in">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Erro!</strong> <?php echo $this->session->flashdata('falhaDelecaoDoRegistro'); ?>
	</div>
	<?php endif; ?>


	<!-- 
	@ AVISO: ERRO NA INSERÇÃO
	-->
	<?php if($this->session->flashdata('erroValidacaoFormulario')): ?>
	<div class="alert alert-error fade in">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Erro!</strong> <?php echo $this->session->flashdata('erroValidacaoFormulario'); ?>
	</div>
	<?php endif; ?>


	<!-- 
	@ AVISO: ERRO UPLOAD IMAGEM
	-->
	<?php if($this->session->flashdata('erroUploadImagem')): ?>
	<div class="alert alert-error fade in">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Erro!</strong> <?php echo $this->session->flashdata('erroUploadImagem'); ?>
	</div>
	<?php endif; ?>
	