<?php
    $db=mysqli_connect("localhost", "root", "Sourav123@", "confessionsite")
                or die('Error connecting to database');
?>
<html>
	<head>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
		<script> src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
		</script>
		<title>
			Confession Website
		</title>
	<meta charset="utf-8"/>
	</head>
	<body>
		<nav>
            <span id="about">
				<a href="aboutusconfession/about.html">ABOUT US</a>
            </span>
		</nav>
		
		<div id="mycreation">
            <img class="homeImg" src=images/confession.jpg>
            <a class="btn btn-lg btn-primary" id="see" href="#confessions" role="button">See confessions</a>
            <a class="btn btn-lg btn-primary" id="make" href="makeConfess.php" role="button">Make confession</a>
		</div>
        <div id="confessions">
            <?php 
                $query="select * from adminperm
                       where permission=1";
                $result=mysqli_query($db, $query);
                if(!$result)die ("Database access failed:". mysql_error());
                while($row=mysqli_fetch_array($result))
            {?>
                <div class="conf">
                    <span>
                        Message no #<?php echo $row['id'];?>
                    </span>
                    <div class="message">
                        <span> Confession:</span> 
                        <span>
                            <?php echo $row['message']?>
                        </span>
                    </div>
                </div>                  
            <?php }?>
           <?php mysqli_close($db);?>
        </div>
	</body>
</html>
