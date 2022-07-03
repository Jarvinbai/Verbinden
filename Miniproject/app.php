
<?php
    $con=new mysqli("localhost","root","","miniproject");
    $sql="select * from questions order by rand()";
    $que=array();
    $res=$con->query($sql);
    if($res->num_rows>0)
    {
        while($row=$res->fetch_assoc())
        {
            $que[]=$row;
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jarvin Bai</title>
    <link rel="stylesheet" type="text/css"  href="css/test.css">
    
    
</head>
<body>
    <h1>GATE EXAM  <small> mock test</small></h1>
    <h2 id="status"></h2>
    <div id="board">
        
        
    </div>
    <script>
    <?php
            
            echo 'var questions='.json_encode($que).';';
        ?>
    </script>
    <script src="script.js"></script>
    <script>
        DisplayQuestion();
    </script>