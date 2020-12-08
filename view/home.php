<?php ob_start();?>
<div class="content">
    <h4 class="pdt-20">Bienvenue <?php echo $_SESSION['login'];?></h4>
</div>

<!-- Bouton disconnect -->
<form action="" method="post" name="disconnect">
    <input type="submit" value="Disconnect" name="dc">
</form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
