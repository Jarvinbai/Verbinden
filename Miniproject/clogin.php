<?php
session_start();
    include "database.php";
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
                <h3 id="heading">Community Login Here</h3>
                <div id="center"> 
                <?php
                if(isset($_POST["submit"])){
                    $sql="SELECT * FROM community WHERE CNAME='{$_POST["cname"]}' AND CPASS='{$_POST["cpass"]}'";
                    $res=$db->query($sql);
                    if($res->num_rows>0)
                    {
                        $row=$res->fetch_assoc();
                        $_SESSION["CID"]=$row["CID"];
                        $_SESSION["CNAME"]=$row["CNAME"];
                        header("location:chome.php");
                    }
                    else
                    {
                        echo "<p class='error'>Invalid User Details</p>";
                    }

                }
                ?>
                <form action="clogin.php" method="post">
                    <label>Name</label>
                    <input type="text" name="cname" required> 
                    <label>Password</label>
                    <input type="password" name="cpass" required>
                    <button type="submit" name="submit">Login Now</button>
                </form>
                </div>

            </div>
            <div id="navi">
                <?php
                include "sidebar.php";
                ?>

            </div>
            <div id="footer">
                <p>Copyright &copy; novus 2022</p>
            </div>

            
        </div>    
    </body>
</html>