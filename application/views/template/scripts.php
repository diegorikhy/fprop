<?php if (isset($scripts) && count($scripts) > 0): ?>
    <?php foreach ($scripts as $script): ?>
        <script src="<?php echo base_url() . $script['path']; ?>"></script>  
    <?php endforeach; ?>
<?php endif; ?>


