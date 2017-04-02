<!DOCTYPE html>
<html>
<head>
    <title>Validate confession</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<?php 
    

    $name="";
    $year="";
    $branch="";
    $email="";
    $message="";
  include_once 'includes/sql_config.php';
    include_once 'secret.php';
  $db=mysqli_connect(HOST, USER, PASSWORD, DATABASE)
              or die('Error connecting to database');
    $email=mysqli_real_escape_string($db,$_POST["email"]);
    $email=test_input($email);
    $message=mysqli_real_escape_string($db,$_POST["confmsg"]);
    $message=test_input($message);
    $captcha=$_POST["g-recaptcha-response"];
    if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
    //$ip=$_SERVER['REMOTE_ADDR'];
    //myedits
        echo $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        $obj = json_decode($response);
        if($obj->success == true)
            {
                    echo "Captcha is working";
            }
        else
            {
                    echo "Captcha is not working";
            }
    //edits end

    /*$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
    $responseKeys=json_decode($verifyResponse,true);
      if($responseKeys->success) 
        {
          echo '<center><h2>Thanks for posting confession.</h2>';
          echo '<a href="index.php">Check your confession here</a></center>';          
        } 
        else 
        {
             echo '<h2>You are a spamming</h2>';
             exit;
        }*/
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        //fixed a bug which was cousing "rn" to appear whenever "enter" key is pressed
        $data = preg_replace( "/rn/", " ", $data );
        return $data;
    }
    if($message ){
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
        /*$emailid1="sahoosourav1996@gmail.com";
        $emailid2="ankitguleria1@gmail.com";
        $subject="Confession";
        $string="Message".$message." email id:".$email;
        if(mail($emailid1,$subject,$string,"")){
            $message="admin has also been notified";
            echo "<script> alert('$message');</script>";
        }
        
        else{
            $message="admin1 can't be notified";
            echo "<script> alert('$message');</script>";
        }
        if(mail($emailid2,$subject,$string,"")){
        }
        else{
            $message="admin2 can't be notified";
            echo "<script> alert('$message');</script>";
        }*/
    }
    else
        {
            echo "<center>You have to enter some message<br>
    You're being redirected to previous page within 5 seconds<center>";
    header( "refresh:5;url=makeConfess.php" );
        }
    mysqli_close($db);
?> 
</body>
</html>