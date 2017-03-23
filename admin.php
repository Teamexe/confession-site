<?php
    $db=mysqli_connect("localhost", "root", "Sourav123@", "confessionsite")
      or die('Error connecting to database');
    $query="select * from adminperm
            where permission=0";
    $result=mysqli_query($db, $query);
    if(!$result)die ("Database access failed:". mysql_error());
?>
<html>
    <body>
        <div id="container">
            <?php
            while($row=mysqli_fetch_array($result))
            {?>
                <div class="name">
                    <span> Name:</span> 
                    <span>
                        <?php
                            echo $row['name'];
                        ?>
                    </span>
                </div>
                <div class="year">
                    <span> Year:</span> 
                    <span>
                        <?php
                            echo $row['year'];
                        ?>
                    </span>
                </div>
                <div class="branch">
                <span> branch:</span> 
                    <span>
                        <?php
                            echo $row['branch'];
                        ?>
                    </span>
                </div>
            <div class="email">
                <span> email:</span> 
                    <span>
                        <?php
                            echo $row['email'];
                        ?>
                    </span>
                </div>
                <div class="message">
                    <span> Confession:</span> 
                    <span>
                        <?php echo $row['message']?>
                    </span>
                </div>
                <div class="buttons">
                    <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <button type="submit" value="<?php echo $row['id']?>" name="accept">Accept</button>
                        <?php if($row['email']!=""){
                            echo "Enter the reason to reject the confession ";
                            $name="reason";
                            $rows="5";
                            echo "<textarea name='$name' rows='$rows'></textarea>";
                        }?>
                        <button type="submit" value="<?php echo $row['id']?>" name="reject">Reject</button>
                    </form>
                </div>
                <br>
           <?php }?>
        </div>
        <?php
            function test_input($data) 
                {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
            if(isset($_POST['accept']))
            {
                $id=$_POST["accept"];
                $subject="Acceptance of confession";
                $sql="update adminperm
                     set permission=1
                     where id='$id';";
                $msg="Your message has been verified and published on the site";
                $result=mysqli_query($db, $sql);
                if(!$result)die ("Database access failed:". mysql_error());
                $sql="select email from adminperm where id='$id'";
                $result=mysqli_query($db, $sql);
                if(!$result)die ("Database access failed:". mysqli_error());
                while($row = mysqli_fetch_assoc($result)){
                    if(mail($row['email'],$subject,$msg,"")){
                        $message="person has been sent msg";
                        echo "<script> alert('$message');</script>";
                    }
                    else{
                        $message="person can't be notified";
                        echo "<script> alert('$message');</script>";
                    }
                }

            }
               
            if(isset($_POST['reject']))
            {
                $id=$_POST['reject'];
                $msg=$_POST["reason"];
                $subject="from confession site team.exe";
                $sql="select email from adminperm where id='$id'";
                $result=mysqli_query($db, $sql);
                if(!$result)die ("Database access failed:". mysqli_error());
                while($row = mysqli_fetch_assoc($result)){
                    if(mail($row['email'],$subject,$msg,"")){
                        $message="person has been sent msg";
                        echo "<script> alert('$message');</script>";
                    }
                    else{
                        $message="person can't be notified";
                        echo "<script> alert('$message');</script>";
                    }
                }
               $sql="delete from adminperm where id='$id'";
                $result=mysqli_query($db,$sql);
                if(!$result)die("Entry can't be deleted");
            }
             mysqli_close($db);
        ?>
        
    </body>
</html>