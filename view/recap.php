<?php 
    ob_start();
?>    
    <div id="page-recap">
        <section class="content">
            <form action="recap" method="post">
                <select name="classe" id="select_classe">
                    <?php foreach ($classes as $classe) {?>
                        <option value="<?= $classe['nom']; ?>">Classe de <?= $classe['nom']; ?></option><?php
                    }?>
                </select>
                <input type="date" id="start" name="date" value="<?php echo date('Y-m-d')?>">
                <input type="submit" value="OK" name="first_submit">
            </form>
            <?php 
                if(isset($_POST["classe"])){
                    foreach($absence as $row){
                        $date = date_create($row['date']);
                        $heure = date_create($row['heure']);
                        if($row['classe'] == $_POST['classe']){ 
                            if($row['date'] == $_POST['date']){?>
                                <div class="classe_absence"><?php
                                    if($row['absent'] != NULL){
                                        echo "<h4> Liste des élèves absents pour le :</h4>";
                                        echo "<h4>".date_format($date, 'd-m-Y')." à <span class='accent'>".date_format($heure, 'H:i')."h</span>  <br> Classe : ".$row['classe']."</h4>";
                                        $eleve_absent = explode(", ",$row['absent']);
                                        foreach($eleve_absent as $name){
                                            echo "<p> - ".$name."</p>";
                                        }
                                    }else if(isset($row['classe'])){
                                        echo "<h4>Le ".date_format($date, 'd-m-Y')." à <span class='accent'>".date_format($heure, 'H:i')."h</span> <br> Classe : ".$row['classe']."</h4>";
                                        echo "<p>Pas d'absents !</p>";
                                    }?>
                                </div><?php
                            }else{
                                // do nothing;
                            }
                        }else{
                            // do nothing;
                        }
                    }
                }
            ?>
        </section>
    </div>
    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
