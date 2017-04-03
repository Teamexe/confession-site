<?php
    include_once 'includes/sql_config.php';
    include_once 'secret.php';
  $db=mysqli_connect(HOST, USER, PASSWORD, DATABASE)
              or die('Error connecting to database');

            $report="";
            $id=$_POST['confessionid'];
            

            $sql="update adminperm set report=report + 1 where id=$id and permission=1;";
            mysqli_query($db, $sql);
            if(isset($_POST['submit']))
            header( "refresh:5;url=index.php" );
?>