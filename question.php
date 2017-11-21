<?php
include 'mysqliConnector/mysqli.php'; 


        if(isset($_POST["radios"])){

           if ($_POST["radios"] == 'tf' || isset($_SESSION["radios"])){ //On prend l'ancien father on le met en father de l'ancien child, le nouveau father deviens le father de l'ancien child 
                
                if($_POST["radios"] == 'tf'){
                    array_push($_SESSION["childrenFather"],$_SESSION["comparedConcept"]);
                }                 
                
                $_SESSION["radios"] = 'tf';
                if(sizeof($_SESSION["children"]) != 0){
                    $_SESSION["comparedConcept"] = $_SESSION["children"][sizeof($_SESSION["children"])-1];
                    unset($_SESSION["children"][sizeof($_SESSION["children"])-1]);
                    $queryContrib ='INSERT INTO contribution  (ip, `concept1`, `concept2`,`vote`)  VALUES ("'.$_SERVER["REMOTE_ADDR"].'","'.$_SESSION["conceptaplacer"].'","'.$_SESSION["comparedConcept"].'","'.$_POST["radios"].'")';
                    $mysqli->query($queryContrib);
                }
                else{
                    foreach($_SESSION["childrenFather"] as $value){                        
                        $query2 = 'UPDATE taxonomy_v3 SET father = "'.strtolower($_SESSION["conceptaplacer"]).'" WHERE father = "'.$_SESSION["father"].'" AND child = "'.$value.'"';
                        $mysqli->query($query2);
                    }                    
                    $query = 'INSERT INTO taxonomy_v3  VALUES ("'.strtolower($_SESSION["father"]).'", "'.strtolower($_SESSION["conceptaplacer"]).'", "'.strtolower($_SESSION["domaine"]).'")';
                    $mysqli->query($query);
                    $query3 = 'UPDATE competences SET placed = 1 WHERE nom = "'.$_SESSION["conceptaplacer"].'"';                   
                    $mysqli->query($query3);
                    $queryContrib ='INSERT INTO contribution  (ip, `concept1`, `concept2`,`vote`)  VALUES ("'.$_SERVER["REMOTE_ADDR"].'","'.$_SESSION["conceptaplacer"].'","'.$_SESSION["comparedConcept"].'","'.$_POST["radios"].'")';
                    $mysqli->query($queryContrib);
                    header('Location: thankyou.php ');
                }
                                

            }

            else if ($_POST["radios"] == 'tc'){
                 
                $children = array(); 
                $_SESSION["father"] = $_SESSION["comparedConcept"];
                $c = 0;   
                foreach($_SESSION["data"] as $value){            
                    if($value[name] == $_SESSION["father"]){                    
                        array_push($children,$value[children]);                    
                        unset($_SESSION["data"][$c]);                         
                    }
                    $c++;            
                }

                if(sizeof($children) != 0){
                    $_SESSION["children"] = $children;
                    $_SESSION["comparedConcept"] = $_SESSION["children"][sizeof($_SESSION["children"])-1];
                    unset($_SESSION["children"][sizeof($_SESSION["children"])-1]);
                    $queryContrib ='INSERT INTO contribution  (ip, `concept1`, `concept2`,`vote`)  VALUES ("'.$_SERVER["REMOTE_ADDR"].'","'.$_SESSION["conceptaplacer"].'","'.$_SESSION["comparedConcept"].'","'.$_POST["radios"].'")';
                    $mysqli->query($queryContrib);
                }        
                else{
                    $query = 'INSERT INTO taxonomy_v3  VALUES ("'.strtolower($_SESSION["father"]).'", "'.strtolower($_SESSION["conceptaplacer"]).'", "'.strtolower($_SESSION["domaine"]).'")';
                    $query3 = 'UPDATE competences SET placed = 1 WHERE nom = "'.$_SESSION["conceptaplacer"].'"';
                    $mysqli->query($query);
                    $mysqli->query($query3);
                    $queryContrib ='INSERT INTO contribution  (ip, `concept1`, `concept2`,`vote`)  VALUES ("'.$_SERVER["REMOTE_ADDR"].'","'.$_SESSION["conceptaplacer"].'","'.$_SESSION["comparedConcept"].'","'.$_POST["radios"].'")';
                    $mysqli->query($queryContrib);
                    header('Location: thankyou.php ');
                    
                }
                
                
            
            } 

            else if ($_POST["radios"] == 'te'){        // On enleve juste le concepte car il a deja ete place        
                $query3 = 'UPDATE competences SET placed = 1 WHERE nom = "'.$_SESSION["conceptaplacer"].'"';
                $mysqli->query($query3);
                $queryContrib ='INSERT INTO contribution  (ip, `concept1`, `concept2`,`vote`)  VALUES ("'.$_SERVER["REMOTE_ADDR"].'","'.$_SESSION["conceptaplacer"].'","'.$_SESSION["comparedConcept"].'","'.$_POST["radios"].'")';
                $mysqli->query($queryContrib);
                header('Location: thankyou.php ');
                
            }

            else if ($_POST["radios"] == 'td' && sizeof($_SESSION["children"]) != 0){ // On cherche en largeur
                $_SESSION["comparedConcept"] = $_SESSION["children"][sizeof($_SESSION["children"])-1];
                unset($_SESSION["children"][sizeof($_SESSION["children"])-1]);
                $queryContrib ='INSERT INTO contribution  (ip, `concept1`, `concept2`,`vote`)  VALUES ("'.$_SERVER["REMOTE_ADDR"].'","'.$_SESSION["conceptaplacer"].'","'.$_SESSION["comparedConcept"].'","'.$_POST["radios"].'")';
                $mysqli->query($queryContrib);
            }

            else if($_POST["radios"] == 'td' && sizeof($_SESSION["children"]) == 0){ //On a fini la largeur du coup on le pose sur cette profondeur
                $query = 'INSERT INTO taxonomy_v3  VALUES ("'.strtolower($_SESSION["father"]).'", "'.strtolower($_SESSION["conceptaplacer"]).'", "'.strtolower($_SESSION["domaine"]).'")';
                $query3 = 'UPDATE competences SET placed = 1 WHERE nom = "'.$_SESSION["conceptaplacer"].'"';
                $mysqli->query($query);
                $mysqli->query($query3);
                $queryContrib ='INSERT INTO contribution  (ip, `concept1`, `concept2`,`vote`)  VALUES ("'.$_SERVER["REMOTE_ADDR"].'","'.$_SESSION["conceptaplacer"].'","'.$_SESSION["comparedConcept"].'","'.$_POST["radios"].'")';
                $mysqli->query($queryContrib);
                header('Location: thankyou.php ');
            }
            

            
        }
        
        
       
        

     

        echo '<h1>Field: '.$_SESSION["domaine"].'</br>';
        echo '</br> Give the relative position between <a target="_blank" href="https://en.wikipedia.org/wiki/'.$_SESSION["conceptaplacer"].'">'.$_SESSION["conceptaplacer"].'</a> and  <a target="_blank" href="https://en.wikipedia.org/wiki/'.$_SESSION["comparedConcept"].'">'.strtoupper($_SESSION["comparedConcept"]).'</a>? </h1>';
        

    
      
        echo '<form id = "radios">';
        echo '<div class = "test">';
        echo '<a target="_blank" href="https://en.wikipedia.org/wiki/'.$_SESSION["conceptaplacer"].'">'.strtoupper($_SESSION["conceptaplacer"]).'</a> is a kind of <a target="_blank" href="https://en.wikipedia.org/wiki/'.$_SESSION["comparedConcept"].'">'.strtoupper($_SESSION["comparedConcept"]).'</a>';
        echo '</br>';
        echo '<input  type="radio" name= "taxocheck" value="tc" id="r1" checked="checked" />';
        echo '<label class="tree" id="tree-child" for = "r1" ></label>';        
        echo '</div>';
        echo '<div class = "test">';
        echo '<a target="_blank" href="https://en.wikipedia.org/wiki/'.$_SESSION["comparedConcept"].'">'.strtoupper($_SESSION["comparedConcept"]).'</a> is a kind of <a target="_blank" href="https://en.wikipedia.org/wiki/'.$_SESSION["conceptaplacer"].'">'.strtoupper($_SESSION["conceptaplacer"]).'</a>';
        echo '</br>';
        echo '<input  type="radio" name= "taxocheck" value="tf" id="r2" />';
        echo '<label class="tree" id="tree-father" for = "r2" ></label>';
        echo '</div>';
        echo '<div class = "test">';
        echo '<a target="_blank" href="https://en.wikipedia.org/wiki/'.$_SESSION["conceptaplacer"].'">'.strtoupper($_SESSION["conceptaplacer"]).'</a> is the same as <a target="_blank" href="https://en.wikipedia.org/wiki/'.$_SESSION["conceptaplacer"].'">'.strtoupper($_SESSION["comparedConcept"]).'</a>';
        echo '</br>';
        echo '<input  type="radio" name= "taxocheck" value="te" id="r3" />';
        echo '<label class="tree" id="tree-equal" for = "r3" ></label>';
        echo '</div>';
        echo '<div class = "test">';
        echo '<a target="_blank" href="https://en.wikipedia.org/wiki/'.$_SESSION["conceptaplacer"].'">'.strtoupper($_SESSION["conceptaplacer"]).'</a> are not directly related to <a target="_blank" href="https://en.wikipedia.org/wiki/'.$_SESSION["conceptaplacer"].'">'.strtoupper($_SESSION["comparedConcept"]).'</a>';
        echo '</br>';
        echo '<input  type="radio" name= "taxocheck" value="td" id="r4" />';
        echo '<label class="tree" id="tree-dif" for = "r4" ></label>';
        echo '</div>';
        echo '</form>'; 
               
        echo '<button id="submit3"> Validate!</button>';
       

        
            
    
        
?>

<script type = "text/javascript" language = "javascript">


   

    $('#submit3').click(function(event)
        { 
            $("#taxo").load('question.php', {"radios":$('input[name=taxocheck]:checked', '#radios').val()} );  
    });

    
</script>


<script>

var treeChild = [
  {
    "name": '<?php echo strtoupper($_SESSION["comparedConcept"]); ?>',
    "parent": "null",
    "children": [
      {
        "name": '<?php echo $_SESSION["conceptaplacer"]; ?>',
        "parent": '<?php echo strtoupper($_SESSION["comparedConcept"]); ?>'
      }]
    }];

var treeFather = [
  {
    "name": '<?php echo $_SESSION["conceptaplacer"]; ?>',
    "parent": "null",
    "children": [
      {
        "name": '<?php echo strtoupper($_SESSION["comparedConcept"]); ?>',
        "parent": '<?php echo $_SESSION["conceptaplacer"]; ?>'
      }]
    }];

var treeEqual =[{
        "name": '<?php echo $_SESSION["conceptaplacer"]; ?>/<?php echo strtoupper($_SESSION["comparedConcept"]); ?>',
        "parent": 'Node'
      }]

var treeDif = [
  {
    "name": 'Known father',
    "parent": "null",
    "children": [
      {
        "name": '<?php echo $_SESSION["conceptaplacer"]; ?>',
        "parent": 'Node'
      },
      {
        "name": '<?php echo strtoupper($_SESSION["comparedConcept"]); ?>',
        "parent": 'Node'
      }
      ]
}];
 

    

// ************** Generate the tree diagram	 *****************
var margin = {top: 30, right: 10, bottom: 30, left: 10},
	width = 100,
	height = 100;
	
var i = 0;

var tree = d3.layout.tree()
	.size([height, width]);

var diagonal = d3.svg.diagonal()
	.projection(function(d) { return [d.x, d.y]; });


var svgChild = d3.select("#tree-child").append("svg")
	.attr("width", width + margin.right + margin.left)
	.attr("height", height + margin.top + margin.bottom)
    .append("g")
	.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

var svgFather = d3.select("#tree-father").append("svg")
	.attr("width", width + margin.right + margin.left)
	.attr("height", height + margin.top + margin.bottom)
    .append("g")
	.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

var svgEqual = d3.select("#tree-equal").append("svg")
	.attr("width", width + margin.right + margin.left)
	.attr("height", height + margin.top + margin.bottom)
    .append("g")
	.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

 var svgDif = d3.select("#tree-dif").append("svg")
	.attr("width", width + margin.right + margin.left)
	.attr("height", height + margin.top + margin.bottom)
    .append("g")
	.attr("transform", "translate(" + margin.left + "," + margin.top + ")");
  

rootChild = treeChild[0];
rootFather = treeFather[0];
rootEqual = treeEqual[0];
rootDif = treeDif[0];

  
update(rootChild, svgChild, rootChild);
update(rootFather, svgFather, rootFather);
update(rootEqual, svgEqual, rootEqual);
update(rootDif, svgDif, rootDif);


function update(source,svg,root) {

  // Compute the new tree layout.
  var nodes = tree.nodes(root).reverse(),
	  links = tree.links(nodes);

  // Normalize for fixed-depth.
  nodes.forEach(function(d) { d.y = d.depth * 100; });

  // Declare the nodes…
  var node = svg.selectAll("g.node")
	  .data(nodes, function(d) { return d.id || (d.id = ++i); });

  // Enter the nodes.
  var nodeEnter = node.enter().append("g")
	  .attr("class", "node")
	  .attr("transform", function(d) { 
		  return "translate(" + d.x + "," + d.y + ")"; });

  nodeEnter.append("circle")
	  .attr("r", 10)
	  .style("fill", "#fff");

  nodeEnter.append("text")
	  .attr("y", function(d) { 
		  return d.children || d._children ? -18 : 18; })
	  .attr("dy", ".35em")
	  .attr("text-anchor", "middle")
	  .text(function(d) { return d.name; })
	  .style("fill-opacity", 1);

  // Declare the links…
  var link = svg.selectAll("path.link")
	  .data(links, function(d) { return d.target.id; });

  // Enter the links.
  link.enter().insert("path", "g")
	  .attr("class", "link")
	  .attr("d", diagonal);

}

</script>







