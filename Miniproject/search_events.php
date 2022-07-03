
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
                <h3 id="heading">Search Events</h3>
                <div id="center">
                
                    <form action="<?php echo $_SERVER["PHP_FILE"];?>" method="post">
                        <label>Enter Event Name Or Keywords</label>
                        <input type="text" required name="name">
                        <button type="submit" name="submit">Search Now</button>

                    </form>

                </div>
                <?php
                 if(isset($_POST["submit"]))
                 {
            
                    $sql="SELECT * FROM event where ENAME like '%{$_POST["name"]}%' or Keywords like '%{$_POST["name"]}%' ";
                    $res=$db->query($sql);
                    if($res->num_rows>0){
                        echo "<table>
                                <tr>
                                    <th>SNO</th>
                                    <th>EVENT NAME</th>
                                    <th>KEYWORDS</th>
                                    <th>VIEW</th>
                                    <th>COMMENT</th>
                                
                                </tr>
                                    ";
                                    $i=0;
                                while($row=$res->fetch_assoc())
                                {
                                    $i++;
                                    echo "<tr>";
                                    echo "<td>{$i}</td>";
                                    echo "<td>{$row["ENAME"]}</td>";
                                    echo "<td>{$row["KEYWORDS"]}</td>";
                                    echo "<td><a href='{$row["FILE"]}' target='_blank'>View</a></td>";
                                    echo "<td><a href='comment.php?id={$row["EID"]}'>Go</a></td>";
                                    echo "</tr>";


                                }
                                echo "</table>";
                    }
                    else{
                        echo "<p class='error'>No Events Records Found</p>";
                    }
                }
                ?>
                

            </div>
            <div id="navi">
                <?php
                include "studentsidebar.php";
                ?>

            </div>
            <div id="footer">
                <p>Copyright &copy; novus 2022</p>
            </div>