<?php 
    $name="";
    $year="";
    $branch="";
    $email="";
    $message="";
  $db=mysqli_connect("localhost", "root", "Sourav123@", "confessionsite")
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
        return $data;
    }
    if($message){
        $sql="INSERT INTO adminperm (email, message) values ('$email',' $message')";
        if(mysqli_query($db,$sql)){
            echo "Your message has been sent to the admin for a review process";
        }
        else{
            echo "Sorry we are not able to send the data";
        }
        $emailid1="sahoosourav1996@gmail.com";
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
        }
    }
    else
        echo "You have to enter some message";
    mysqli_close($db);
?> 