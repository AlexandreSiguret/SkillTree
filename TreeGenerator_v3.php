<?php
    include 'mysqliConnector/mysqli.php'; 
    include 'JsonGenerator.php';

    $field = 'skills'; 
       
    $query = 'SELECT * FROM taxonomy_v3';
    $result = $mysqli->query($query);
    
    $i = 0;
    while ($row = $result->fetch_assoc()) {
                 
            $rows[$i] = [ 'name' => $row["father"], 'children' => $row['child']];                       
            $i++; 
    }
   
    
     
   
   
    
    function treeCreator($rows,$field){
        $firstChildren = array();

        //$c = 0;
        foreach($rows as $value){            
            if($value[name] == $field){                    
                array_push($firstChildren,$value[children]);
                //unset($rows[$c]);                         
            }
            $c++;
            
        }
               
        
        $res =array();        
        $res = addDepth($res,$field,treeCreatorAux($rows,$firstChildren));
        return $res;
    }



    function treeCreatorAux($rows,$children){ 

         
        $res = array();
       
        foreach($children as $father){
            
            $newChildren = array();

            //$t = 0;
            foreach($rows as $newValue){                               
                if($newValue[name] == $father){               
                    array_push($newChildren,$newValue[children]);
                    //unset($rows[$t]); 
                }
                $t++;
            } 
            
             
            if(sizeof($newChildren) != 0){ 
                                 
                $res = addDepth($res,$father,treeCreatorAux($rows,$newChildren));
                   
            }

            else{
                
                $res = addLeaf($res,$father);                   

            }
            
       }
        
    return $res;

    }

    $tree = treeCreator($rows,$field);   
    $tableau_pour_json = ['name'=>'ROOT', 'children'=> $tree];
    $contenu_json =json_encode($tableau_pour_json);    
    $skillTreeBase = 'skillTreeJson.json';    
    $fichier = fopen($skillTreeBase, 'w+');    
    fwrite($fichier, $contenu_json);   
    fclose($fichier);


?>