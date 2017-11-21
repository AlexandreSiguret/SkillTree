<?php

include 'mysqliConnector/mysqli.php';     


for ($i = 0; $i < 5; $i++) {
    if(!empty($_POST["competence".$i])){
       
        
        $queryp = $mysqli->prepare('INSERT INTO precheck  VALUES ( ?, 1,"'.$_SESSION["domaine"].'")');
        $queryp->bind_param('s', $_POST["competence".$i]);
        $queryp->execute();        
             
        
    }    
}




 
$mysqli->close();

?>
