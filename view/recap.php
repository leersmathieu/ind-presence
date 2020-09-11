<?php 
    ob_start();
?>    
    <div id="page-recap">
        <section class="content">
            <?php foreach($absence as $row){?>
                <div class="classe_absence"><?php
                    if($row['absent'] != NULL){
                        echo "<h4> Liste des élèves absents pour le </h4>";
                        echo "<h4> Le ".$row['date']." à ".$row['heure']." <br> Classe : ".$row['classe']."</h4>";
                        $eleve_absent = explode(", ",$row['absent']);
                        foreach($eleve_absent as $name){
                            echo "<p> - ".$name."</p>";
                        }
                    }else if(isset($row['classe'])){
                        echo "<h4>Le ".$row['date']." à ".$row['heure']." <br> Classe : ".$row['classe']."</h4>";
                        echo "Pas d'absents !";
                    }?>
                </div><?php
            }?>
        </section>
    </div>
    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
