<?php

function barre($q){
    require 'config/database.php';

    if (isset($q) AND !empty($q)){
        $q = htmlspecialchars($q);

        $req = $bdd->prepare('SELECT login FROM user WHERE login LIKE "' . $q . '%" ORDER BY id DESC');
        
        $l = $req->fetchAll();
    
        $num_rows = $req->rowCount();





        if ($num_rows > 0) {
            while ($l) { 
                echo $l['login'];
            }
        }
        else {
            echo "Aucun résultat...";
        }
    }
}

?>