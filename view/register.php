<?php ob_start(); ?>

<!-- Formulaire d'inscription -->
<form action="" method="post">
    <label for="loginreg">Choisis un username</label>
    <input type="text" name="loginreg"><br />
    <label for="pwdreg">Choisis un password</label>
    <input type="password" name="pwdreg"><br />
    <input type="submit" value="Inscription" name="register">
</form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
