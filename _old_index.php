<?php
    include_once 'includes/sql_config.php';
$db=mysqli_connect(HOST, USER, PASSWORD, DATABASE)
              or die('Error connecting to database');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Confession site by - Team .EXE">
    <meta name="author" content="Team .EXE">
    <link rel="icon" href="exe.nith.ac.in/images/confess.png">

    <title>Confess - Team .EXE</title>

<?php 
      include_once('stylesheets.php');
      echo "</head><body>";
      include_once('header.php');
?>   
	  
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
                $counter=-1;
                if(!$result)die ("Database access failed:". mysql_error());
                while($row=mysqli_fetch_array($result))
                {?>
                    <?php if($counter==-1)
                        $counter=$row['id']?>
                    <div class="conf" id="conf<?php echo $row['id']?>">
                        <div class="title">
                            <strong>
                                 Confession #<?php echo $row['id'];?>
                            </strong>
                            <span id="gotop">
                                <a href="#conf<?php echo $counter;?>">Go to top</a>
                            </span>
                        </div>
                         <div class="message">
                            <i class="fa fa-quote-left fa-2x" aria-hidden="true"></i>
                            <div class="orimess">
                                <?php echo htmlspecialchars_decode(stripslashes($row['message']));?>
                             </div>
                            <?php $id=$row['id'];?>
                        </div>
                        <div class="fb-like" data-href="http://exe.nith.ac.in/confess/#like<?php echo $id; ?>" id="like<?php echo $id;?>" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
                        <div class="fb-comments" id="<?php echo $id;?>" data-href="http://exe.nith.ac.in/confess/#<?php echo $id; ?>" data-width="100%" data-numposts="100">
                        </div>
                    </div>                  
                <?php }
                    mysqli_close($db);
                ?>
            </div>

	</body>
</html>
