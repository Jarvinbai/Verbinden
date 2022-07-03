
<?php
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
                <h3 id="heading">New Community Registration</h3>
                <div id="center">
                <?php
                    
                    if(isset($_POST["submit"]))
                        {
                              $sql="insert into community(CNAME,CPASS,CCLG) values('{$_POST["cname"]}','{$_POST["cpass"]}','{$_POST["cclg"]}')";
                              
                              $db->query($sql);
                              echo "<p class='success'>Community Registration Success</p>";
                          
                        }
                
                ?>
                    <form action="<?php echo $_SERVER["PHP_FILE"];?>" method="post">
                        <label>Community Name</label>
                        <input type="text" name="cname" required>
                        <label>Password</label>
                        <input type="password" name="cpass" required>
                        <label>College</label>
                        <input type="text" name="cclg" required>
                        <button type="submit" name="submit">Register Now</button>

                    </form>

                </div>
                

            </div>
            <div id="navi">
                <?php
                include "sidebar.php";
                ?>

            </div>