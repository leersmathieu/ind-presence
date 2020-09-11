<?php //Routeur\\

    require('controller/controller.php');

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'myclass') {
            pageMyclass();
        }
        else if ($_GET['action'] == 'connection'){
            pageConnection();
        }
        else if ($_GET['action'] == 'presence'){
            pagePresence();
        }
        else if ($_GET['action'] == 'recap'){
            pageRecap();
        }
        else {
            pageConnection();            
        }
    }
    else {
        pageConnection();
    }