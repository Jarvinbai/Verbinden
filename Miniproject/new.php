
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
                <h3 id="heading">New Student Registration</h3>
                <div id="center">
                <?php
                    if(isset($_POST["submit"]))
                        {
                            
                                 $sql="insert into student(NAME,PASS,MAIL,COLLEGE) values('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["clg"]}')";
                                 
                                 $db->query($sql);
                                 echo "<p class='success'>User Registration Success</p>";
                            
                            
                            

                        
                        }
                
                ?>
                    <form action="<?php echo $_SERVER["PHP_FILE"];?>" method="post" >
                        <label>Name</label>
                        <input type="text" name="name" required>
                        <label>Password</label>
                        <input type="password" name="pass" required>
                        <label>Email ID</label>
                        <input type="email" name="mail" required>
                        <select name="clg" required>
                            <option value="">Select</option>
                            <option value="geci">geci</option>
                            <option value="tkm">tkm</option>
                            <option value="cet">cet</option>
                            <option value="rit">rit</option>
                            <option value="others">others</option>
                        </select>
                        <button type="submit" name="submit">Register Now</button>

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