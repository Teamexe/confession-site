<?php
    $db=mysqli_connect("localhost", "root", "Sourav123@", "confessionsite")
                or die('Error connecting to database');
?>

<html>
    <head>
        <title> reporting page</title>
        <link rel="stylesheet" href="css/makeConfess.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="jquery/jquery-3.2.0.min.js">
        </script>
        <meta charset="utf-8"/>
    </head>
    <body>
        <script>
            $(document).ready(function(){
                alert('To report a message please type the Confession id and to report anything else submit the message without any message id');
            })
        </script>
        <div id="main">
            <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="confessionid">
                    Enter the confession id without #
                </label>
                <div class="input">
                    <input class="inpf" name="confessionid" type="text" placeholder="">
                </div>
                <div class="input">
                    <label for="report">
                         What is the report?
                    </label><br>
                    <textarea class="inpf" name="report" rows="5"></textarea>
                </div>
                <input type="submit" class="btn btn-info" id="submission" value="Submit" name="submit">
            </form>
        </div>
    </body>
</html>