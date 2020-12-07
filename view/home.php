<?php ob_start();
session_start(); ?>

<!-- Formulaire login -->
<div>Hello you</div>
<?php echo $_SESSION['login'];?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
