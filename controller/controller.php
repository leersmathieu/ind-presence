<?php //CONTROLLEUR\\

    require('modele/modele.php'); 

    function pageRegister(){

        $login = register();
        require('view/register.php');
    }
    
    function pageConnection(){
        
        session_start();
        $login = login();
        require('view/login.php');
    }

    function pageHome(){
        session_start();
        if(!isset($_SESSION['login'])){
            header("Location: login");
            exit(); 
        }
        $logout = logout();
        require('view/home.php');

    }

    function pagePresence(){

        session_start();
        if(!isset($_SESSION['login'])){
            header("Location: login");
            exit(); 
        }

        date_default_timezone_set('Europe/Paris');
        $date = date("Y-m-d");
        $heure = date("H:i");

        $eleves= getStudent();
        $classes= getClass();
        $insertAbsence = insertAbsence();
    
        require('view/presence.php');
    }

    function pageRecap(){

        session_start();
        if(!isset($_SESSION['login'])){
            header("Location: login");
            exit(); 
        }

        date_default_timezone_set('Europe/Paris');
        $date = date("Y-m-d");
        $heure = date("H:i");
        
        $absence = getAbsence();
        $classes= getClass();

        require('view/recap.php');
    }