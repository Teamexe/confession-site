<?php
  require_once('recaptchalib.php');
    include_once 'includes/sql_config.php';
    include_once 'secret.php';
  require_once('secret.php');
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) 
  {
    // What happens when the CAPTCHA was entered incorrectly
die ("<center>The reCAPTCHA wasn't entered correctly. Go back and try it again."."(reCAPTCHA said: ".$resp->error.")");
  } 
  else 
  {
            $db=mysqli_connect(HOST, USER, PASSWORD, DATABASE)
            or die('Error connecting to database');

            $report="";
            $id=$_POST['confessionid'];
            
            $sql="update adminperm set report=report + 1 where id=$id and permission=1;";
            mysqli_query($db, $sql);
            echo "<center>Report Submitted, We'll get to it soon</center><br>";
            if(isset($_POST['submit']))
            header( "refresh:5;url=index.php" );
  }
  ?>