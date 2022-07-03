
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
                <h3 id="heading">Change Password</h3>
                <div id="center">
                <?php
                   if(isset($_POST["submit"]))
                        {
                        $sql="SELECT * from student WHERE PASS='{$_POST["opass"]}' and ID='{$_SESSION["ID"]}'";
                        echo $_POST["opass"];
                        $res=$db->query($sql);
                        if($res->num_rows>0)
                        {
                            $s="update student set PASS='{$_POST["npass"]}' WHERE ID=".$_SESSION["ID"];
                            $db->query($s); 
                            echo "<p class='success'>Password Changed Success</p>";
                        }
                        else
                        {
                            echo "<p class='error'>Invalid Password</p>";
                        }

                        
                        }
                
                ?>
                    <form action="<?php echo $_SERVER["PHP_FILE"];?>" method="post">
                        <label>Old Password</label>
                        <input type="password" name="opass" required>
                        <label>New Password</label>
                        <input type="password" name="npass" required>   
                        <button type="submit" name="submit">Update Password</button>

                    </form>

                </div>
                

            </div>
            <div id="navi">
                <?php
                include "studentsidebar.php";
                ?>

            </div>
            <div id="footer">
                <p>Copyright &copy; novus 2022</p>
            </div>