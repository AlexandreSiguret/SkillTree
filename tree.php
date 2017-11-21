<!DOCTYPE html>
<meta charset="utf-8">
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
    <script src="js/dndTree.js"></script>
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
        <a class ="toplink" href ="index.php"> Back </a>
    </div>



    <?php
        include 'TreeGenerator_v3.php';        
    ?>
    <div id="tree-container"></div>
    
</body>
</html>