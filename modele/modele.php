<?php
    function dbconnect(){

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "ind";

        try {
            $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }

        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function isconnected(){ // Fonction 'est connecté' 

        if (!isset($_SESSION['login']) OR !isset($_SESSION['pwd'])){

            return False;
        }

        if (empty($_SESSION['login']) OR empty($_SESSION['pwd'])){

            return False;
        }
        
        return True;

    }

    function sanitize($key, $filter=FILTER_SANITIZE_STRING){ // je crée une fonction que j'apelle sanitize

        $sanitized_variable = null;

            if(is_array($key)){                 // si la valeur est un tableau...

                $sanitized_variable = filter_var_array($key, $filter);

            }

            else {                              // sinon ...

                $sanitized_variable = filter_var($key, $filter);

            }

        return $sanitized_variable;
    }

    function getStudent(){

        $db = dbconnect();
        $request = $db->query('SELECT * FROM etudiant');

        return $request;
    }

    function getClass(){
        $db = dbconnect();
        $request = $db->prepare("SELECT * FROM classe");
        $request->execute(); //Boolean true or false

        $res = $request->fetchAll();

        return $res;
    }

    function insertAbsence(){

        $db = dbconnect();
        $eleves_arr = [];
        
        date_default_timezone_set('Europe/Paris');
        $date = date("Y-m-d");
        $heure = date("H:i");

        if(isset($_POST["classe"]) && isset($_POST["submit"])){
            if(isset($_POST['eleve'])){
                foreach($_POST['eleve'] as $e){
                    array_push($eleves_arr, $e);
                }    
                $eleves_arr = implode($eleves_arr,", ");
            }else{
                $eleves_arr = "";
            }
            $request = $db->query(  'INSERT INTO absence (id, date, heure, classe, absent) 
                                    VALUES (NULL,"'.$date.'", "'.$heure.'", "'.$_POST["classe"].'", "'.$eleves_arr.'")');
            return $request;
        }
    }

    function getAbsence(){
        $db = dbconnect();
        $request = $db->prepare("SELECT id, heure, classe, absent, date FROM absence");
        $request->execute();

        $res = $request->fetchAll();

        return array_reverse($res);
    }

    function register(){
        $db = dbconnect();

        if (isset($_POST['register'])){ // Si on appuie sur 'register'

            sanitize($_POST['register']);
    
            if (isset($_POST['loginreg']) AND isset($_POST['pwdreg'])) { //si...
                
                $login_register = htmlspecialchars($_POST['loginreg']);
                $pwd_register = password_hash($_POST['pwdreg'], PASSWORD_DEFAULT); // on récupère les valeurs POST dans des variables et on up la sécurité
    
                $login_register = sanitize($login_register); 
    
                $registration = $db->prepare("INSERT INTO user  
                                            (name, pwd) 
                                            VALUES(?, ?)");
                                                                // Et on les ajoutes à la database
                $registration->execute(array($login_register,$pwd_register)); 
                echo 'Enregistrement validé';
               
            }
            else {
                echo 'info non valide';
            }
        }
    }

    function login(){
        $db = dbconnect();

        if ( isset($_POST['connection'])){ // si on appuie sur connection

            sanitize($_POST['connection']);
    
            $request = $db->prepare("SELECT *
                                    FROM user
                                    WHERE name = ?");
                                    // récupère la ligne correspondant au login
    
            $request->execute(array($_POST['login']));
    
            $table_pseudo=$request->fetch();//récupération de la table user dans un tableau
    
    
            if(password_verify($_POST['pwd'], $table_pseudo['pwd'])){
                      
                $sessionlogin = htmlspecialchars($_POST['login']);               
                $sessionpwd = $_POST['pwd'];                   
    
                    //recupération variable dans session avec sécurité//
                    
                $_SESSION['login'] = sanitize($sessionlogin);               
                $_SESSION['pwd'] = $sessionpwd;
                // print_r ($_SESSION['pseudo']);
                echo '<body onLoad="alert(\'Connexion reussie...\')">';

                header ('Location: home'); // refresh de la page //

            } 
    
            else {
                echo '<body onLoad="alert(\'Membre non reconnu...\')">';
            }
        }
    }