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
            <h1>
            Information for admin:
                Here the first button means accept and the second button means reject
            </h1>
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
                        <input type="submit" name="accept" value="<?php echo $row['id']?>">
                        <input type="submit" name="reject" value="<?php $row['id']?>">
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
            $sql="update adminperm
                 set permission=1
                 where id='$id';";
            $result=mysqli_query($db, $sql);
            if(!$result)die ("Database access failed:". mysql_error());
            
        }
            mysqli_close($db);
        ?>
    </body>
</html>