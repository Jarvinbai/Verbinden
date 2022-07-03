
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
                <h3 id="heading">New Event Registration</h3>
                <div id="center">
                <?php
                   if(isset($_POST["submit"]))
                        {
                        $sql="insert into register(ID,COURSE,LOGS) values(
                        {$_SESSION["ID"]},'{$_POST["mess"]}',now())";
                        $db->query($sql);
                        echo "<p class='success'>Register Sent To Community</p>";
                        
                        

                        
                        }
                
                ?>
                    <form action="<?php echo $_SERVER["PHP_FILE"];?>" method="post">
                        <label>COURSE</label>
                        <input type="text" required name="mess">
                        <button type="submit" name="submit">Register</button>

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