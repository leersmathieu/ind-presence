<?php 
    ob_start();
    date_default_timezone_set('Europe/Paris');
    $date = date("d-m-Y");
    $heure = date("H:i");
?>

    <div id="page-presence">
        <section class="content">
            <form action="presence" method="post">
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
                    <form action="presence" method="post">
                        <div class="control-group"><?php
                            foreach($classes as $classe){
                                if ($id_class === $classe["id"]){
                                    ?><input id="classe_name" type="text" name="classe" value="<?= $classe['nom'] ?>" readonly><?php
                                }
                            }
                            foreach($eleves as $eleve){
                                if ($eleve['classe_id'] === $id_class){?> 
                                        <label class="control control-checkbox" for="<?= $eleve['nom'] ?>_<?= $eleve['prenom'] ?>"><?= $eleve['nom']." ".$eleve['prenom'] ?>
                                            <input id="<?= $eleve['nom'] ?>_<?= $eleve['prenom'] ?>" type="checkbox" name="eleve[]" value="<?= $eleve['nom']." ".$eleve['prenom'] ?>">
                                            <div class="control_indicator"></div>
                                        </label>
                                    <?php
                                }
                            }?>
                            <div class="description">(Cochez les élèves absents)</div>
                            <input type="submit" value="Envoyer" name="submit">
                        </div>
                    </form><?php
                }
                if(isset($_POST['eleve'])){
                    echo "<div class='recap_presence'>";
                    echo "<h4> Liste des élèves absents pour le </h4>";
                    echo "<h3>".$date." à ".$heure." <br> Classe : ".$_POST["classe"]."</h3>";
                    
                    foreach($_POST['eleve'] as $e){
                        ?> <h5><?= $e ?></h5><?php
                    }
                }else if(isset($_POST["classe"]) && isset($_POST['submit'])){
                    echo "<h3> Le ".$date." à ".$heure." - Classe : ".$_POST["classe"]."</h3>";
                    echo "Pas d'absent !";
                }
                echo "</div>"
            ?>
        </section>
    </div>
    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

<!-- $array = array("value1", "value2", "value3", "...", "valuen");
$array_data = implode("array_separator", $array);

$query = "INSERT INTO my_tbl_name (id, array_data) VALUES(NULL,'" . $array_data . "');"; -->