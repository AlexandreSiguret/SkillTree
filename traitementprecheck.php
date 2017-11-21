<?php
include 'mysqliConnector/mysqli.php'; 
   
   
  
    $i = 0;
    foreach ($_SESSION["rows"] as $value){           
        if($_POST["p".$i] == 'y'){                        
            $inc[$i] = $value;            
        }
        $i++;
    }  

    
    foreach ($inc as $value){            
        $query = 'UPDATE precheck SET checkpoint = checkpoint+1 WHERE competence = "'.$value.'"';           
        $res = $mysqli->query($query); 
    }



    
        
$mysqli->close();




?>