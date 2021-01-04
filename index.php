<?php //Routeur\\

    require('controller/controller.php');

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'myclass') {
            pageMyclass();
        }
        else if ($_GET['action'] == 'register'){
            pageRegister();
        }
        else if ($_GET['action'] == 'add_student'){
            pageAddStudent();
        }
        else if ($_GET['action'] == 'edit_student'){
            pageEditStudent();
        }
        else if ($_GET['action'] == 'add_class'){
            pageAddClass();
        }
        else if ($_GET['action'] == 'home'){
            pageHome();
        }
        else if ($_GET['action'] == 'login'){
            pageConnection();
        }
        else if ($_GET['action'] == 'presence'){
            pagePresence();
        }
        else if ($_GET['action'] == 'recap'){
            pageRecap();
        }
        else {
            pageHome();            
        }
    }
    else {
        pageHome();
    }