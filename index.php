<?php
    include_once 'includes/sql_config.php';
  $db=mysqli_connect(HOST, USER, PASSWORD, DATABASE)
              or die('Error connecting to database');
?>
<html>
	<head>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome-animation.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<script src="jquery/jquery-3.2.0.min.js">
		</script>
		<title>
			Team .EXE - Confession Website
		</title>
	<meta charset="utf-8"/>
	</head>
	<body style=" background-color:white">
        <!--script for facebook plugins-->
        <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


        <!--code for nav bar-->
        
        <nav>
            <div id="mySidenav" class="sidenav">
                <a href="#"class="closebtn" onclick="closeNav()">&times;</a>
                <a href=".">Home</a>
                <a href="about/index.html">About Us</a>
                <a href="http://exe.nith.ac.in/contact.php">Contact Us</a>
            </div>
            <span id="main">
                <span class="menu" style="cursor:pointer" onclick="openNav()">&#9776;</span>
            </span>
            <script>
                function openNav() {
                    document.getElementById("mySidenav").style.width = "250px";
                    document.getElementById("main").style.marginLeft = "250px";
                    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
                }

                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                    document.getElementById("main").style.marginLeft= "0";
                    document.body.style.backgroundColor = "white";
                }
            </script>

            <span id="teamexe">
                <a href="index.php"><img class="logo" src="about/logoc.png" alt="exe logo"></a>
            </span>
            
            <span class="dropdown">
                <a href="#" class="dropbutton">    
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                </a>
                <div class="dropdown-content">
                    <a href="makeConfess.php">Confess here</a>
                    <a href="reportinfo.php">Report Confession</a>
                </div>
            </span>
            <span id="makeConfess" >
                <a role="button" class="btn btn-lg btn-primary" href="makeConfess.php">Confess here</a>
                <a role="button" class="btn btn-lg btn-primary" href="reportinfo.php">Report Confession</a>
            </span>
        </nav>

        <!-- for slider
        
        <div class="slideshow-container">

            <div class="mySlides fade">
              <img class="mainImg" src="images/confess10.jpg" style="width:100% ">
              <div class="text"><a href="#confessions"><i class="fa fa-angle-double-down faa-vertical animated hover fa-3x"></i></a>
                </div>
            </div>
            
            <div class="mySlides fade">
              <img class="mainImg" src="images/confess14.jpg" style="width:100%">
              <div class="text"><a href="#confessions"><i class="fa fa-angle-double-down faa-vertical animated hover fa-3x"></i></a>
                </div>
            </div>

            <div class="mySlides fade">
              <img class="mainImg" src="images/confess15.jpg" style="width:100%">
              <div class="text"><a href="#confessions"><i class="fa fa-angle-double-down faa-vertical animated hover fa-3x"></i></a>
                </div>
            </div>

            </div>
            <br>

            <div style="text-align:center">
              <span class="dot"></span> 
              <span class="dot"></span> 
              <span class="dot"></span> 
        </div>
        <script>
            var slideIndex = 0;
            showSlides();

            function showSlides() {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                   slides[i].style.display = "none";  
                }
                slideIndex++;
                if (slideIndex> slides.length) {slideIndex = 1}    
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace("active","");
                }
                slides[slideIndex-1].style.display = "block";  
                dots[slideIndex-1].className += " active";
                setTimeout(showSlides, 7800); // Change image every 2 seconds
            }
        </script>-->

        <!-- for footer-->
        
        <div class="fixed" align="center">
            <i class="fa fa-copyright" aria-hidden="true"></i>
                : 2017 | Designed, Developed & Hosted by
            <a href="http://exe.nith.ac.in">Team.exe</a>
            <span id="icons">
                <a href="https://www.facebook.com/teamexe/">
                    <img id="fb" src="about/facebook.png" align="right" alt="facebook" onmouseover="bigImg(this)" onmouseout="normalImg(this)" title="Like us on facebook" style="width:2%;height:2%">
                </a>

                <a href="https://www.youtube.com/channel/UCTIpvLaM1G-uUsthgCDauKw">
                    <img src="about/youtube.png" align="right" alt="you tube" title="Subscibe us on you tube" onmouseover="bigImg(this)" onmouseout="normalImg(this)" style="width:2%;height:2%">
                </a>

                <a href="https://www.instagram.com/teamexenith/">
                    <img src="about/insta.png" align="right" alt="instagram" onmouseover="bigImg(this)" onmouseout="normalImg(this)" title="Follow us on Instagram" style="width:2%;height:2%">
                </a>
            </span>
        </div>
        <script>
            function bigImg(x) {
                x.style="width:2%;height:2%";
            }
            function normalImg(x) {
                x.style="width:2%;height:2%"
            }
        </script>
        
        
        <!--Backend display of confessions-->
        
        <div id="confessions">
            <?php 
                $query="select * from adminperm
                        where permission=1 order by id desc";
                $result=mysqli_query($db, $query);
                if(!$result)die ("Database access failed:". mysql_error());
                while($row=mysqli_fetch_array($result))
                {?>

                    <div class="conf">
                        <div class="title">
                            <strong>
                                 Confession #<?php echo $row['id'];?>
                            </strong>
                            <span id="gotop">
                                <a href="#mycreation">Go to top</a>
                            </span>
                        </div>
                         <div class="message">
                            <i class="fa fa-quote-left fa-2x" aria-hidden="true"></i>
                            <div class="orimess">
                                <?php echo htmlspecialchars_decode(stripslashes($row['message']));?>
                             </div>
                            <?php $id=$row['id'];?>
                        </div>
                        <!-- Facebook like & comment plugin -->
            <div class="fb-like" data-href="http://exe.nith.ac.in/confess/index.php" data-width="100" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
            <div class="fb-comments" data-href="http://exe.nith.ac.in/confess/index.php" data-width="100%" data-numposts="100"></div>
                        </div>
                    </div>                  
                <?php }?>
               <?php mysqli_close($db);?>
            </div>

	</body>
</html>
