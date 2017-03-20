<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="css/makeConfess.css?version=2">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
         <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title> Confession Page</title>
    </head>
    <body>
        <div id="main"> 
            <div id="reqd">
                <strong>
                    All info fields are optional
                </strong>
            </div>
            <form role="form" action="confessdb.php" method="post" >
                    <div class="input">
                        <input type="text"  class="inpf" name="name"  placeholder="Enter name">
                    </div>
                    <div class="input">
                        <input type="text" name="year" class="inpf" placeholder="Enter Year"> 
                    </div>
                    <div class="input">
                        <input type="text" name="branch" class="inpf" placeholder="Enter branch">
                    </div>
                    <div class="input">
                        <input type="text" name="email" class="inpf" placeholder="Enter email id"> 
                    </div>
                    <div class="input">
                        <label for="message">
                            Write your confession here
                        </label><br>
                        <textarea class="inpf" name="confmsg" rows="5">
                        </textarea>
                    </div>
                    <input type="submit" class="btn btn-info" id="submission" value="Submit" name="submit">
            </form>
        </div>
    </body>
</html>
