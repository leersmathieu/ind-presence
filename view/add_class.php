<?php ob_start(); ?>

<!-- Formulaire d'inscription -->
<form action="" method="post">
    <label for="student_name">Nom de la classe</label>
    <input type="text" name="class_name"><br />
    <input type="submit" value="Ajouter" name="add_class">
</form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
