<?php ob_start(); ?>

<!-- Formulaire login -->
<form action="" method="post">
    <label for="login">login</label>
    <input type="text" name="login"><br />
    <label for="password">mot de passe</label>
    <input type="password" name="pwd"><br />
    <input type="submit" value="Connexion" name="connection">
</form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
