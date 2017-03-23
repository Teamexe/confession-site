<?php
    $db=mysqli_connect("localhost", "root", "Sourav123@", "confessionsite")
                or die('Error connecting to database');
?>

<html>
    <head>
        <title> reporting page</title>
        <link rel="stylesheet" href="css/makeConfess.css">
        <link rel="stylesheet" href="css/reportinfo.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="jquery/jquery-3.2.0.min.js">
        </script>
        <meta charset="utf-8"/>
    </head>
    <body>
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
            $name=$_POST['name'];
            $year=$_POST['year'];
            $branch=$_POST['branch'];
            $email=$_POST['email'];
            $report=$_POST['report'];
            $string=$name." of ".$branch." of year ".$year." complained about confession ".$id." report: ".$report;
            if($name=="" || $year=="" || $branch==""||$email==""){
                $message="Please enter all the required fields";
                echo "<script> alert('$message');</script>"; 
            }
            else{
                $email="sahoosourav1996@gmail.com";
               $string=wordwrap($string,70);
                if($id!=""){
                    $subject="Confession report";
                }
                else{
                    $suject="Normal report";
                }
                if(mail($email,$subject,$string,"")){
                    echo "hello";
                    $message="Your report has been sent to the admin for a review process";
                    echo "<script> alert('$message');</script>"; 
                } 
                else{
                    $message="your report can't be sent to the admin";
                    echo "<script> alert('$message');</script>"; 
                }
            }
        ?>
        <div id="info">
            To report a message please type the Confession id and to report anything else submit the message without any confession id
        </div>
        <div id="main">
            <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="confessionid">
                    Enter confession id without #
                </label>
                <div class="input">
                    <input class="inpf" name="confessionid" type="text" placeholder="" value="<?php echo $id?>">
                </div>
                <div class="input">
                    <input type="text"  class="inpf" name="name"  placeholder="Enter name" value="<?php echo $name?>">
                </div>
                <div class="input">
                    <input type="text" name="year" class="inpf" placeholder="Enter Year" value="<?php echo $year?>"> 
                </div>
                <div class="input">
                    <input type="text" name="branch" class="inpf" placeholder="Enter branch" value="<?php echo $branch?>">
                </div>
                <div class="input">
                    <input type="text" name="email" class="inpf" placeholder="Enter email id " value="<?php echo $email?>"> 
                </div>
                <div class="input">
                    <label for="report">
                         What is the report?
                    </label><br>
                    <textarea class="inpf" name="report" rows="5"><?php echo $report?></textarea>
                </div>
                <input type="submit" class="btn btn-info" id="submission" value="Submit" name="submit"> 
            </form>
        </div>
    </body>
</html>