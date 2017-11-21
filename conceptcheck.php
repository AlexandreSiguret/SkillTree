<?php

include 'mysqliConnector/mysqli.php'; 

$_SESSION["contrib"] = 0;
$query = 'SELECT competence FROM precheck WHERE checkpoint < 5 AND domaine = "'.$_SESSION["domaine"].'" ORDER BY RAND() LIMIT 5';


if ($result = $mysqli->query($query)) {    
    $i = 0;
    while ($row = $result->fetch_assoc()) {       
        $rows[$i] = $row["competence"];
        $i++;
    }   
    $result->free();
}
$_SESSION["rows"] = $rows;
echo '<div id ="transb">';
echo '<h1>Concept check</h1>';
echo '<form id = "check">';
$i = 0;
foreach ($rows as $value){    
    echo '<p>Does <a target="_blank" href="https://en.wikipedia.org/wiki/'.$value.'">'.$value.'</a> belong to <a target="_blank" href="https://en.wikipedia.org/wiki/'.$_SESSION["domaine"].'">'.strtoupper($_SESSION["domaine"]).'</a> field?</p>';
    
    echo '<input type="radio" name="'.$i.'" value="y" > Yes ';
    echo '<input type="radio" name="'.$i.'" value="n"checked > No <br>';
   $i++;
}
echo '</form>';
echo '<button id="submit2"> Validate!</button>';
echo '</div>';

//*******initialisation de l'algo pour les questions**********//
$_SESSION["comparedConcept"] = "";
$_SESSION["radios"] = NULL;
$_SESSION["childrenFather"] = array();
$_SESSION["children"] = array();
$_SESSION["father"] = $_SESSION["domaine"];
$query2 = 'SELECT * FROM taxonomy_v3 WHERE domaine = "'.$_SESSION["domaine"].'"';
$result2 = $mysqli->query($query2);
   
    $y = 0;
    while ($row2 = $result2->fetch_assoc()) {
            
            $rows2[$y] = [ 'name' => $row2["father"], 'children' => $row2['child']];                       
            $y++; 
    }

    $_SESSION["data"] = $rows2;

    $children = array(); 
            //$c = 0;   
            foreach($_SESSION["data"] as $value){            
                if($value[name] == $_SESSION["father"]){                    
                    array_push($children,$value[children]);                    
                    //unset($_SESSION["data"][$c]);                         
                }
                $c++;            
            }
            if(sizeof($children) > 0){
                
                $_SESSION["children"] = $children;
                $_SESSION["comparedConcept"] = $_SESSION["children"][sizeof($_SESSION["children"])-1];
                unset($_SESSION["children"][sizeof($_SESSION["children"])-1]);
            }  
            else{
                $_SESSION["comparedConcept"] = $_SESSION["domaine"];
            }         
            
     

/**-----------------------------------------------------------------------------*****///

?>

<script type = "text/javascript" language = "javascript">


     $('#submit2').click(function(event)
        {          
            

            $.ajax({
                url: 'traitementprecheck.php',
                type:'POST',
                data:
                {
                    p0 : $('input[name= 0 ]:checked', '#check').val(),
                    p1 : $('input[name= 1 ]:checked', '#check').val(),
                    p2 : $('input[name= 2 ]:checked', '#check').val(),
                    p3 : $('input[name= 3 ]:checked', '#check').val(),
                    p4 : $('input[name= 4 ]:checked', '#check').val()                              
                }   
                                        
            });
            document.getElementById("submit2").remove(); 
            alert('Your opinion has been taken into account');
            
            
            
            
    });
</script>