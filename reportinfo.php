<?php
    include_once 'includes/sql_config.php';
  $db=mysqli_connect(HOST, USER, PASSWORD, DATABASE)
              or die('Error connecting to database');
?>

<html>
    <head>
        <title> reporting page</title>
        <link rel="stylesheet" href="css/reportinfo.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome-animation.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="jquery/jquery-3.2.0.min.js">
        </script>
        <meta charset="utf-8"/>
    </head>
    <body style="background-color:lavender;">
        <?php
            $id="";
            $name="";
            $year="";
            $branch="";
            $email="";
            $report="";
            $id=$_POST['confessionid'];
            $sql="update adminperm set report=report + 1 where id=$id and permission=1;";
            mysqli_query($db, $sql);
            header( "refresh:5;url=index.php" );
            /*
            $name=$_POST['name'];
            $year=$_POST['year'];
            $branch=$_POST['branch'];
            $email=$_POST['email'];
            $report=$_POST['report'];
            $string=$name." of ".$branch." of year ".$year." complained about confession ".$id." report: ".$report." email id:".$email;
            if($name=="" || $year=="" || $branch==""||$email=="")
            {
                $message="Please enter all the required fields";
                echo "<script> alert('$message');</script>"; 
            }
            else
            {
                /*$email1="sahoosourav1996@gmail.com";
                $email2="ankitguleria1@gmail.com";
               $string=wordwrap($string,70);
                if($id!=""){
                    $subject="Confession report";
                }
                else{
                    $subject="Normal report";
                }
                if(mail($email,$subject,$string,"")){
                    $message="Your report has been sent to the admin for a review process";
                    echo "<script> alert('$message');</script>"; 
                    $id="";
                    $name="";
                    $year="";
                    $branch="";
                    $email="";
                    $report="";
                } 
                else{
                    $message="your report can't be sent to the admin1";
                    echo "<script> alert('$message');</script>"; 
                }
                if(mail($email2,$subject,$string,"")){
                    $id="";
                    $name="";
                    $year="";
                    $branch="";
                    $email="";
                    $report="";
                }
                else{
                    $message="your report can't be sent to the admin2";
                    echo "<script> alert('$message');</script>"; 
                }
            }*/
        ?>
        <div id="info">
            <div id="mainContent">
                <i class="fa fa-exclamation-triangle faa-flash animated" aria-hidden="true"></i>
                <span id="warning">
                <?php
                        if (!isset($id)) 
                        {
                            echo "To report a confession please type the Confession id else submit without it";
                        }
                        else
                        {
                            echo "<center>Thanks for reporting. Your contribution matters.</center>";
                        }
                ?>
                </span>
            </div>
        </div>
        <div id="main">
            <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="confessionid">
                    Enter confession id without #
                </label>
                <div class="input">
                    <input class="inpf" name="confessionid" size="25" type="text" placeholder="" value="<?php echo $id?>">
                </div>
                <div class="input">
                    <input type="text"  class="inpf" name="name" size="25"  placeholder="Enter name" value="<?php echo $name?>">
                </div>
                <div class="input">
                    <input type="text" name="year" class="inpf" size="25" placeholder="Enter Year" value="<?php echo $year?>"> 
                </div>
                <div class="input">
                    <input type="text" name="branch" class="inpf" size="25" placeholder="Enter branch" value="<?php echo $branch?>">
                </div>
                <div class="input">
                    <input type="text" name="email" class="inpf" size="25" placeholder="Enter email id " value="<?php echo $email?>"> 
                </div>
                <div class="input">
                    <label for="report">
                         What is the report?
                    </label><br>
                    <textarea class="inpf" name="report" rows="5" cols="25"><?php echo $report?></textarea>
                </div>
                <input type="submit" class="btn btn-info" id="submission" value="Submit" name="submit"> 
            </form>
        </div>
    </body>
</html>