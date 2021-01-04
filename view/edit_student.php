<?php 
    ob_start();
?>
    <div id="page-edit-students">
        <section class="content">
            <form action="" method="post">
                <h4>Supprimer un élève</h4>
                <p class=pdt-20>Classe de l'élève</p>
                <select name="classe" id="select_classe">
                    <?php foreach ($classes as $classe) {?>
                        <option value="<?= $classe['id']; ?>">Classe de <?= $classe['nom']; ?></option><?php
                    }?>
                </select>
                <input type="submit" value="OK" name="first_submit">
            </form>
            <?php 
                if(isset($_POST["classe"])){
                    $id_class = $_POST["classe"];?>
                    <form action="" method="post">
                        <div class="control-group"><?php
                            foreach($classes as $classe){
                                if ($id_class === $classe["id"]){
                                    ?><input id="classe_name" type="text" name="classe" value="<?= $classe['nom'] ?>" readonly><?php
                                }
                            }
                            foreach($eleves as $eleve){
                                if ($eleve['classe_id'] === $id_class){?> 
                                        <label class="control control-radio" for="<?= $eleve['nom'] ?>_<?= $eleve['prenom'] ?>"><?= $eleve['nom']." ".$eleve['prenom'] ?>
                                            <input id="<?= $eleve['nom'] ?>_<?= $eleve['prenom'] ?>" type="radio" name="eleve[]" value="<?= $eleve['nom']." ".$eleve['prenom'] ?>">
                                            <div class="control_indicator"></div>
                                        </label>
                                    <?php
                                }
                            }?>
                            <div class="description">(Cochez les élèves absents)</div>
                            <input type="submit" value="Envoyer" name="edit_student">
                        </div>
                    </form><?php
                }
                echo "</div>"
            ?>
        </section>
    </div>
    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>