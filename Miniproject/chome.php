<?php
session_start();
include "database.php";

function countRecord($sql,$db)
{
    $res=$db->query($sql);
    return $res->num_rows;
}


if(!isset($_SESSION["CID"]))
{
    header("location:clogin.php");
}
?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>Verbindon</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1>Verbindon</h1>
            </div>
            <div id="wrapper">
                <h3 id="heading">Welcome <?php echo $_SESSION["CNAME"];?></h3>
                <div id="center"> 
                    <ul class="record">
                        <li>Total Students : <?php echo countRecord("select * from student",$db); ?></li>
                        <li>Total Events : <?php echo countRecord("select * from event",$db); ?></li>
                        <li>Total Registers : <?php echo countRecord("select * from register",$db); ?></li>
                        <li>Total Comments : <?php echo countRecord("select * from comment",$db); ?></li>
                    </ul>
              
                </div>

            </div>
            <div id="navi">
                <?php
                include "communitysidebar.php";
                ?>

            </div>
            <div id="footer">
                <p>Copyright &copy; novus 2022</p>
            </div>

            
        </div>    
    </body>
</html>