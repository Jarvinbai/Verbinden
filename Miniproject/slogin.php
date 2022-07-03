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
                <h3 id="heading">Student Login Here</h3>
                <div id="center"> 
                <?php
                if(isset($_POST["submit"])){
                    $sql="SELECT * FROM student WHERE NAME='{$_POST["name"]}' AND PASS='{$_POST["pass"]}'";
                    $res=$db->query($sql);
                    if($res->num_rows>0)
                    {
                        $row=$res->fetch_assoc();
                        $_SESSION["ID"]=$row["ID"];
                        $_SESSION["NAME"]=$row["NAME"];
                        header("location:shome.php");
                    }
                    else
                    {
                        echo "<p class='error'>Invalid User Details</p>";
                    }

                }
                ?>
                <form action="slogin.php" method="post">
                    <label>Name</label>
                    <input type="text" name="name" required> 
                    <label>Password</label>
                    <input type="password" name="pass" required>
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