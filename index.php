<?php
    session_start();
?>
<!DOCTYPE html>
<html>
 <head>
     <title>
        Skill hierachy creator
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
 </head>
 <body>
     
<?php include 'mysqliConnector/mysqli.php'; ?>

    <img id ="icon" src="images/druid.png"/> 
    <div id = "title">
    
    
   
    <h2> Skill hierachy creator</h2>
    <?php
    $query = ' SELECT COUNT(*) nom FROM competences';
    $query2 = ' SELECT COUNT(*) id FROM contribution';    ;
    $result = $mysqli->query($query);
    $result2 = $mysqli->query($query2);
    $row = $result->fetch_assoc();
    $row2 = $result2->fetch_assoc();
    

    echo '<h3>Our goal is to produce the largest consitant open-source skill repository, please contribute! (concepts:'.$row["nom"].', contributions: '.$row2["id"].' )</h3>';
   
    ?>      
    </div>
    <div id ='treepage'>
        <a class = "toplink" href ="tree.php"> See the current tree</a>
    </div>
    <div class="container">  
    
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap = "false" data-keyboard = "false">
    

    <!-- Wrapper for slides -->
    <div  class="carousel-inner">

    <!-- Choose a field -->
        <div class="item active">
        <h1>Choose a field : </h1>       
            <select id="domaine">
                <?php
                    $query = 'SELECT * FROM domaines ';
                    $result = $mysqli->query($query);
                        while ($row = $result->fetch_assoc()) {       
                            echo '<option >'.$row["nom"].'</option>';
                            $i++;
                    }
                ?>            
            </select>        
        </div>  

        <!-- addCompetence -->  
        <div class="item" id ="addComp">addCompetence</div> 

        <!-- conceptCheck -->
        <div class="item" id ="verif">conceptCheck</div>
    
        <!-- taxonomy -->
        <div class="item" id = "taxo">taxonomy</div>
    
    
    </div>


    <!-- Left and right controls -->
   
    <a id ="load"  class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
    
  </div>
</div>

  
<script type = "text/javascript" language = "javascript">
        
   
       
   
         $(document).ready(function() {
            $("#load").click(function(event){
                var currentIndex = $('div.active').index() + 1;
                if(currentIndex >= 3){                    
                    document.getElementById("load").remove();                               
                }
                else{                
                var domaine = $("#domaine").val();                
                $("#addComp").load('addConcepts.php', {"domaine":domaine} );               
                $("#verif").load('conceptcheck.php');
                $("#taxo").load('question.php'); 
                }
               
            });
        });
   
</script>
 
</body>
</html>