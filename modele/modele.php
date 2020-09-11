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
        $date = date("y-m-d");
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
        $request = $db->prepare("SELECT * FROM absence");
        $request->execute();

        $res = $request->fetchAll();

        return $res;
    }
