<?php
session_start();
include "database.php";




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
                <h3 id="heading">View Student Details</h3>
                <?php
                    $sql="SELECT * FROM student";
                    $res=$db->query($sql);
                    if($res->num_rows>0){
                        echo "<table>
                                <tr>
                                    <th>SNO</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>COLLEGE</th>
                                
                                </tr>
                                    ";
                                    $i=0;
                                while($row=$res->fetch_assoc())
                                {
                                    $i++;
                                    echo "<tr>";
                                    echo "<td>{$i}</td>";
                                    echo "<td>{$row["NAME"]}</td>";
                                    echo "<td>{$row["MAIL"]}</td>";
                                    echo "<td>{$row["COLLEGE"]}</td>";
                                    echo "</tr>";


                                }
                                echo "</table>";
                    }
                    else{
                        echo "<p class='error'>No Student Records Found</p>";
                    }
                ?>
               

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