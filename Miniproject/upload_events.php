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
                <h3 id="heading">Upload Events</h3>
                <div id="center">
                <?php
                    
                    if(isset($_POST["submit"]))
                        {
                            $target_dir="upload/";
                            $target_file=$target_dir.basename($_FILES["efile"]["name"]);
                            if(move_uploaded_file($_FILES["efile"]["tmp_name"],$target_file))
                            {
                                
                                 $sql="insert into event(ENAME,KEYWORDS,FILE) values('{$_POST["ename"]}','{$_POST["keys"]}','{$target_file}')";
                                 
                                 $db->query($sql);
                                 echo "<p class='success'>Event Upload Success</p>";
                            }
                            else
                            {
                                echo "<p class='error'>Error In Upload</p>";
                            } 
                            
                            

                        
                        }
                
                ?>
                    <form action="<?php echo $_SERVER["PHP_FILE"];?>" method="post" enctype="multipart/form-data">
                        <label>Event Name</label>
                        <input type="text" name="ename" required>
                        <label>Keyword</label>
                        <textarea name="keys" required></textarea> 
                        <label>Upload File</label>
                        <input type="file" name="efile" required>
                        <button type="submit" name="submit">Upload Event</button>

                    </form>

                </div>
                

            </div>
            <div id="navi">
                <?php
                include "communitysidebar.php";
                ?>

            </div>
            <div id="footer">
                <p>Copyright &copy; novus 2022</p>
            </div>