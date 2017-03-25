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
        
		<script src="jquery/jquery-3.2.0.min.js">
		</script>
		<title>
			Confession Website
		</title>
	<meta charset="utf-8"/>
	</head>
	<body style=" background-color:#c5d3dd">
        <!--script for facebook plugins-->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "http://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=127593347773095";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
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
                <a href="aboutusconfession/about.html">About Us</a>
                <a href="reportinfo.php">Report Us</a>
                <a href="#">Contact Us</a>
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
                    document.body.style.backgroundColor = "#c5d3dd";
                }
            </script>

            <span id="teamexe">
                <img class="logo" src="aboutusconfession/logoc.png" alt="exe logo">
            </span>
            <span id="plustag">
                <a href="#" class="plusbutton" onClick="dropdown()">     <i class="fa fa-plus" aria-hidden="true"></i>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                </a>
            </span>
            <span id="makeConfess" >
                <a role="button" class="btn btn-lg btn-primary" href="makeConfess.php">Make Confession</a>
            </span>
        </nav>
        <div id="plusmake">
            Make Confession
        </div>
        <script>
            function dropdown(){
                document.getElementById("plusmake").style.visibility="visible";
            }
        </script>
		<div id="mycreation">
            <img class="homeImg" src=images/confession.jpg>
		</div>
        <div class="fixed" align="center">
             <i class="fa fa-copyright" aria-hidden="true"></i>
                    : 2017 | Designed, Developed & Hosted by
                <a href="http://exe.nith.ac.in">Team.exe</a>
            <div id="icons">
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
                        <span class="orimess">
                            <?php echo $row['message']?>
                        </span>
                    </div>
                    <div class="fb-like" data-href="https://localhost/confession/#confession/#<?php echo $id?>" data-width="5" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                    <div class="fb-comments" id="<?php echo $id;?>"data-href="https://localhost/confession/#<?php echo $id?>" data-width="100%" data-numposts="3">
                    </div>
                </div>                  
            <?php }?>
           <?php mysqli_close($db);?>
        </div>

	</body>
</html>
