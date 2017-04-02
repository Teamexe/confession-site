<?php
    include_once 'includes/sql_config.php';
    include_once 'secret.php';
  $db=mysqli_connect(HOST, USER, PASSWORD, DATABASE)
              or die('Error connecting to database');
           /*$id="";
            $name="";
            $year="";
            $branch="";
            $email="";*/
            $report="";
            $id=$_POST['confessionid'];
            if(isset($_POST["g-recaptcha-response"]))
            $captcha=$_POST["g-recaptcha-response"];
            if(!$captcha){
                echo '<h2>Please check the the captcha form.</h2>';
                exit;
            }
                //echo $secretKey;
            $ip=$_SERVER['REMOTE_ADDR'];
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
            $responseKeys=json_decode($verifyResponse,true);
            if($responseKeys->success) {

                    } 
            else {
                echo '<h2>You are spammer ! Get out</h2>';
                exit;
            }
            $sql="update adminperm set report=report + 1 where id=$id and permission=1;";
            mysqli_query($db, $sql);
            if(isset($_POST['submit']))
            header( "refresh:5;url=index.php" );
?>