<?php
    
    
    function addDepth($assoArray,$nameFather,$assoArrayToAdd){        
        array_push($assoArray,['name' => $nameFather , 'children' => $assoArrayToAdd]);
        return $assoArray;
    }

    function addLeaf($assoArray,$valueLeaf){           
        array_push($assoArray,['name' => $valueLeaf]);       
        return $assoArray;
    }   

?>

