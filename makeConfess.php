<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="css/makeConfess.css?version=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
         <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title> Confession Page</title>
    </head>
    <body>
        <div id="main"> 
            <div id="reqd">
                <strong>
                    <i class="fa fa-asterisk" aria-hidden="true"></i>
                    Required field
                </strong>
            </div>
            <form action="#" method="post" enctype="multipart/form-data">
                    <div class="input">
                        <input type="text" name="name" placeholder="Enter name">
                        <span class="extra">
                            <i class="fa fa-asterisk" aria-hidden="true"></i>  
                        </span> 
                    </div>
                    <div class="input">
                        <input type="text" name="Year" placeholder="Enter Year">
                        <span class="extra">
                            <i class="fa fa-asterisk" aria-hidden="true"></i>  
                        </span> 
                    </div>
                    <div class="input">
                        <input type="text" name="branch" placeholder="Enter branch">
                        <span class="extra">
                            <i class="fa fa-asterisk" aria-hidden="true"></i>  
                        </span> 
                    </div>
                    <div class="input">
                        <input type="text" name="email" placeholder="Enter email id">
                        <span class="extra">
                            <i class="fa fa-asterisk" aria-hidden="true"></i>  
                        </span> 
                    </div>
                    <div class="input">
                        <label for="fileToUpload"> 
                            Please select a .txt file
                        </label><br>
                        <input type="file" name="fileToUpload"> 
                    </div>
                    <input type="submit" class="btn btn-info" id="submission" value="Submit" name="submit">
            </form>
        </div>
    </body>
</html>
