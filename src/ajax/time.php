<?php
    
    session_start();
    require '../config/database.php';
    
    $test =  $_SESSION['user'];

    $req = $bdd->query("SELECT * FROM connexion WHERE creator_mail = '$test'");
    $results = array();

    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    foreach($results as $connect){
        ?>
        <?php  
            if ($connect->connexion == 1) {
              echo "En ligne";   
            }   else if ($connect->connexion == 2) {
                echo "See the ". $connect->time;
            }   else {
                echo "";
            }
        ?>
        <?php
        }
?>