<?php ob_start(); ?>

<!-- Formulaire d'inscription -->
<form action="" method="post">
    <label for="student_name">Nom de l'élève</label>
    <input type="text" name="student_name"><br />
    <label for="student_first_name">Nom de l'élève</label>
    <input type="text" name="student_first_name"><br />
    <label for="student_class">Classe</label>
    <select name="student_class" id="select_classe">
        <?php foreach ($classes as $classe) {?>
            <option value="<?= $classe['id']; ?>">Classe de <?= $classe['nom']; ?></option><?php
        }?>
    </select>
    <input type="submit" value="Ajouter" name="add_student">
</form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
