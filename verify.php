<?php
  require_once('recaptchalib.php');
  require_once('secret.php');
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) 
  {
    // What happens when the CAPTCHA was entered incorrectly
    echo "Captcha entered is wrong<br>";
    
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again."."(reCAPTCHA said: ".$resp->error .")");
  } 
  else 
  {
    // Your code here to handle a successful verification
    include_once 'includes/sql_config.php';
    $db=mysqli_connect(HOST, USER, PASSWORD, DATABASE)  or die('Error connecting to database');
    $email=mysqli_real_escape_string($db,$_POST["email"]);
    $email=test_input($email);
    $message=mysqli_real_escape_string($db,$_POST["confmsg"]);
    $message=test_input($message);

    echo '<center><h2>Thanks for posting confession.</h2>';
    echo '<a href="index.php">Check your confession here</a></center>';


    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        //fixed a bug which was cousing "rn" to appear whenever "enter" key is pressed
        $data = preg_replace( "/rn/", " ", $data );
        return $data;
    }
    if($message)
    {
        $sql="INSERT INTO adminperm (email, message, permission) values ('$email',' $message',1)";
        if(mysqli_query($db,$sql))
        {
            echo "<center>Your confession has been posted</center>";
            header( "refresh:5;url=index.php" );
        }
        
        else
        {
            echo "<center>Sorry sending failed<br></center>";
        }
    }
    else
        {
              echo "<center>You have to enter some message<br>
              You're being redirected to previous page within 5 seconds<center>";
              header( "refresh:5;url=makeConfess.php" );
        }
    mysqli_close($db);
  }
  ?>