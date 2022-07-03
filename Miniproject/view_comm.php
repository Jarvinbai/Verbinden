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
                <h3 id="heading">View Comment Details</h3>
                <?php
                    $sql="SELECT event.ENAME,student.NAME,comment.COMM,comment.LOGS FROM comment
                    INNER JOIN event ON event.EID=comment.EID INNER JOIN student ON
                    comment.SID=student.ID;";
                    $res=$db->query($sql);
                    if($res->num_rows>0){
                        echo "<table>
                                <tr>
                                    <th>SNO</th>
                                    <th>EVENT</th>
                                    <th>NAME</th>
                                    <th>COMMENT</th>
                                    <th>LOGS</th>
                                
                                </tr>
                                    ";
                                    $i=0;
                                while($row=$res->fetch_assoc())
                                {
                                    $i++;
                                    echo "<tr>";
                                    echo "<td>{$i}</td>";
                                    echo "<td>{$row["ENAME"]}</td>";
                                    echo "<td>{$row["NAME"]}</td>";
                                    echo "<td>{$row["COMM"]}</td>";
                                    echo "<td>{$row["LOGS"]}</td>";
                                    echo "</tr>";


                                }
                                echo "</table>";
                    }
                    else{
                        echo "<p class='error'>No Comments Found</p>";
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