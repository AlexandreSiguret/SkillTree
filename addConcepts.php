<?php
   
    include 'mysqliConnector/mysqli.php'; 
       
    if( $_REQUEST["domaine"] ){ 
        $domaine = $_REQUEST['domaine'];    
    }
        
    $_SESSION['domaine'] = strtolower($domaine);  
    $query = 'SELECT nom FROM competences WHERE domaine = "'.$_SESSION["domaine"].'" ORDER BY RAND() LIMIT 5';
    //query 2 c'est le concept a placer 

 
    $queryStillC = ' SELECT COUNT(*) nom FROM competences WHERE domaine = "'.$_SESSION["domaine"].'" AND  placed = 0';       
    $resultStill = $mysqli->query($queryStillC);       
    $row = $resultStill->fetch_assoc();
    
    //ici se passe la remise a 0 pour les differents passages, ces quelques ligne touche aux tables competences, taxo_v3 et taxo_v3global
    if($row["nom"]==0){

        $restart = 'UPDATE competences SET placed = 0 WHERE domaine = "'.$_SESSION["domaine"].'"';  
        $mysqli->query($restart);     
          
        $getFromv3 = 'SELECT * FROM taxonomy_v3 WHERE domaine = "'.$_SESSION["domaine"].'"';
            
        $resv3 = $mysqli->query($getFromv3);
        
       

        while($v3 = $resv3->fetch_assoc()) {
           
            $checklink = 'SELECT COUNT(*) father FROM taxonomy_v3global WHERE father = "'.$v3["father"].'" AND child =  "'.$v3["child"].'"';            
            
            $linkEx = $mysqli->query($checklink);
            $existe = $linkEx->fetch_assoc(); 
            
            
            if($existe["father"] == 0){               
                $putToV3GA = 'INSERT INTO taxonomy_v3global  VALUES ( "'.$v3["father"].'", "'.$v3["child"].'","'.$v3["domaine"].'", 1)';                
                $mysqli->query($putToV3GA);
            }
        
            else{
                $putToV3GU = 'UPDATE taxonomy_v3global SET votes = votes + 1 WHERE father = "'.$v3["father"].'" AND child =  "'.$v3["child"].'"';
                $mysqli->query($putToV3GU);
            }   
        }

        $queryContrib ='INSERT INTO contribution  (ip, `concept1`, `concept2`,`vote`)  VALUES ("Compteur de passes","'.$_SESSION["domaine"].'","'.$_SESSION["domaine"].'","'.$_SESSION["domaine"].'")';
        $mysqli->query($queryContrib);
        $clear_v3 = 'DELETE FROM taxonomy_v3 WHERE domaine = "'.$_SESSION["domaine"].'"';
        $mysqli->query($clear_v3);        
        
        
    }

    $query2 = 'SELECT nom FROM competences WHERE placed = 0 AND domaine = "'.$_SESSION["domaine"].'" ORDER BY RAND() LIMIT 1';
    
        if ($res = $mysqli->query($query2)) {
            
                while ($row = $res->fetch_assoc()) {
                    $conceptaplacer = $row["nom"];                  
                }   
            $res->free();
        }   
     
    $conceptaplacer = strtoupper($conceptaplacer);        
    $_SESSION["conceptaplacer"] = $conceptaplacer;
    
  
    echo "<h1>(Facultative:)Please add some concepts belonging to ";    
    echo '<a target="_blank" href="https://en.wikipedia.org/wiki/'.$_SESSION["domaine"].'">'.$_SESSION["domaine"].'</a></br> (example: ';
    $result = $mysqli->query($query);
        
    $c = 0;
    while ($row = $result->fetch_assoc()) {              
         echo '<a target="_blank" href="https://en.wikipedia.org/wiki/'.$row["nom"].'">'.$row["nom"].'</a>';
        if($c < $result->num_rows-1){
            echo ', ';
        }
        $c++;            
    }
    echo ')</h1>';
    
    for ($i = 0; $i < 5; $i++) {
        echo '<input type="text" id="competence'.$i.'"  /></br>';
    }    
    
    echo '<button id="submit"> Validate!</button>'


 
        
?>  
<script type = "text/javascript" language = "javascript">

    $('#submit').click(function(event)
        {
        
        var c0 = document.getElementById("competence0").value;
        var c1 = document.getElementById("competence1").value;
        var c2 = document.getElementById("competence2").value;
        var c3 = document.getElementById("competence3").value;
        var c4 = document.getElementById("competence4").value;
        
            $.ajax({
                url: 'traitementadd.php',
                type:'POST',
                data:
                {
                    competence0 : c0.toUpperCase(),
                    competence1 : c1.toUpperCase(),
                    competence2 : c2.toUpperCase(),
                    competence3 : c3.toUpperCase(),
                    competence4 : c4.toUpperCase()                    
                }   
                                        
            });
            alert('Skills were added to the data set');
            
            
    });
</script>
      
