<?php 
    

    $name="";
    $year="";
    $branch="";
    $email="";
    $message="";
  include_once 'includes/sql_config.php';
  $db=mysqli_connect(HOST, USER, PASSWORD, DATABASE)
              or die('Error connecting to database');
    $email=mysqli_real_escape_string($db,$_POST["email"]);
    $email=test_input($email);
    $message=mysqli_real_escape_string($db,$_POST["confmsg"]);
    $message=test_input($message);
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        //fixed a bug which was cousing "rn" to appear whenever "enter" key is pressed
        $data = preg_replace( "/rn/", " ", $data );
        return $data;
    }
    if($message){
        $sql="INSERT INTO adminperm (email, message) values ('$email',' $message')";
        if(mysqli_query($db,$sql))
        {
            echo "<center>Your message has been sent to the admin for a review process<br>You're being redirected to main page within 5 seconds</center>";
            header( "refresh:5;url=index.php" );
        }
        
        else
        {
            echo "Sorry we are not able to send the data";
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