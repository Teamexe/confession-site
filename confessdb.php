<?php 
    $name="";
    $year="";
    $branch="";
    $email="";
    $message="";
  $db=mysqli_connect("localhost", "root", "Sourav123@", "confessionsite")
      or die('Error connecting to database');
     $name=mysqli_real_escape_string($db,$_POST["name"]);
    $name=test_input($name);
    $year=mysqli_real_escape_string($db,$_POST["year"]);
    $year=test_input($year);
    $branch=mysqli_real_escape_string($db,$_POST["branch"]);
    $branch=test_input($branch);
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
        $sql="INSERT INTO adminperm (name, year, branch, email, message) values ('$name','$year',' $branch ', '$email',' $message')";
        if(mysqli_query($db,$sql)){
            echo "Your message has been sent to the admin for a review process";
        }
        else{
            echo "Sorry we are not able to send the data";
        }
        $emailid="sahoosourav1996@gmail.com";
        $subject="Confession";
        $string=$name." of ".$branch." of year ".$year." sent confession ".$message." email id:".$email;
        if(mail($emailid,$subject,$string,"")){
            $message="admin has also been notified";
            echo "<script> alert('$message');</script>";
        }
        else{
            $message="admin can't be notified";
            echo "<script> alert('$message');</script>";
        }
    }
    else
        echo "You have to enter some message";
    mysqli_close($db);
?> 