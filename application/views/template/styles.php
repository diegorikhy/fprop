<?php if( isset( $estilos ) && count( $estilos ) > 0 ): ?>
<?php foreach( $estilos as $arrEstilo ): ?>

<?php if( !empty($arrEstilo['comment'] ) ): ?>
<!-- <?php echo $arrEstilo['comment']; ?> -->
<?php endif; ?>

<link href="<?php echo base_url().$arrEstilo['path']; ?>" rel="stylesheet" type="text/css" /> <!-- Diego -->

<?php endforeach; ?>
<?php endif; ?>
