<?php
session_start();
include "database.php";
if(!isset($_SESSION["ID"]))
{
    header("location:slogin.php");
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
                <h3 id="heading">Send Your Comments</h3>
                    <?php
                        if(isset($_POST["submit"]))
                        {
                            
                            $sql="INSERT INTO comment (EID, SID , COMM, LOGS) VALUES ('{$_GET["id"]}','{$_SESSION["ID"]}','{$_POST["mes"]}',now())";
                            $db->query($sql);
                                 
                            
                           
                        }
                        $sql="SELECT * from EVENT where EID=".$_GET["id"];
                        //$res=$db->query($sql);
                        if($res->num_rows>0)
                        {
                            echo "<table>";
                            $row=$res->fetch_assoc();
                            echo "
                                <tr>
                                    <th>Event Name</th>
                                    <td>{$row["ENAME"]}</td>
                                </tr>
                                <tr>
                                    <th>Keywords</th>
                                    <td>{$row["KEYWORDS"]}</td>
                                </tr>
                            ";   
                            echo "</table>";
                        }
                        /*else
                        {
                            echo "<p class='error'>No Events Found</p>";
                        }*/
                ?>
                <div id="center">
                        <form action="<?php echo $_SERVER["REQUEST_URI"];?>"
                        method="post">
                        
                            <label>Your Comments</label>
                            <textarea name="mes" required></textarea>
                            <button type="submit" name="submit">Post Now</button>
                        </form>
                    

                </div>
                <?php
                    $sql="SELECT student.NAME,comment.COMM,comment.LOGS FROM comment INNER JOIN student on comment.SID=student.ID WHERE comment.EID={$_GET["id"]} ORDER BY comment.CID DESC";
                     
                      
                    $res=$db->query($sql);
                    if($res->num_rows>0)
                      {
                          while($row=$res->fetch_assoc())
                          {
                              echo "<p>
                              <strong>{$row["NAME"]}  : </strong>
                                    {$row["COMM"]}
                              <i>{$row["LOGS"]}</i>  
                              </p>";

                          }


                      }
                    else
                      {
                            echo "<p class='error'>No Comments Yet</p>";
                      }


                ?>

                

            </div>
            <div id="navi">
                <?php
                include "studentsidebar.php";
                ?>

            </div>