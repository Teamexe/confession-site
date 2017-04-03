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

    <title>Confession - Team .EXE</title>

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


  

</body>
</html>