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