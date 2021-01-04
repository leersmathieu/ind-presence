<?php ob_start();?>
<div class="content">
    <h4 class="pdt-20">Bienvenue <?php echo $_SESSION['login'];?></h4>

    <!-- Bouton add student -->
    <ul class="pdt-20">
        <li><a href="add_student">Ajouter un étudiant</a></li>
        <li><a href="edit_student">Supprimer un étudiant</a></li>
        <li><a href="add_class">Ajouter une classe</a></li>
    </ul>
    


    <!-- Bouton disconnect -->
    <form action="" method="post" name="disconnect">
        <input type="submit" value="Disconnect" name="dc">
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
