<?php
   // $db=mysqli_connect("localhost", "root", "Sourav123@", "confessionsite")
              //  or die('Error connecting to database');
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
	
	<img class="logo" src="aboutusconfession/logo.png" alt="exe logo" style="width:15%;height:15%;">
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
		 <div class="fixed" align="center">
	 <i class="fa fa-copyright" aria-hidden="true"></i>
            : 2017 | Designed, Developed & Hosted by Team .EXE
            <a href="https://www.facebook.com/teamexe/">
   <img id="fb" src="aboutusconfession/facebook.png" align="right" alt="facebook" onmouseover="bigImg(this)" onmouseout="normalImg(this)" title="Like us on facebook" style="width:2%;height:2%">
    </a>
    
    <a href="https://www.youtube.com/channel/UCTIpvLaM1G-uUsthgCDauKw">
   <img src="aboutusconfession/youtube.png" align="right" alt="you tube" title="Subscibe us on you tube" onmouseover="bigImg(this)" onmouseout="normalImg(this)" style="width:2%;height:2%">
    </a>
    
    <a href="https://www.instagram.com/teamexenith/">
   <img src="aboutusconfession/insta.png" align="right" alt="instagram" onmouseover="bigImg(this)" onmouseout="normalImg(this)" title="Follow us on Instagram" style="width:2%;height:2%">
    </a>
     
	 </div>
        
        <script>
function bigImg(x) {
    x.style="width:3%;height:3%";
}

function normalImg(x) {
    x.style="width:2%;height:2%"
}
</script>

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
