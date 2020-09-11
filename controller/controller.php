<?php //CONTROLLEUR\\

    require('modele/modele.php'); 

    function pageConnection(){

        // $comptes= getAccounts();
        $comptes = ["test1", "test2"];
    
        require('view/connection.php');
    }

    function pageRecap(){
        
        $absence = getAbsence();

        require('view/recap.php');
    }

    function pagePresence(){

        $eleves= getStudent();
        $classes= getClass();
        $insertAbsence = insertAbsence();
    
        require('view/presence.php');
    }
    