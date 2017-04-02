<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="css/makeConfess.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
         <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title> Confession Page</title>
        <script>
             tinymce.init({
            selector: "textarea",   
             plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars fullscreen autoresize',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools toc'
            
            ],
              toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
              toolbar2: 'preview media | forecolor backcolor emoticons',
              image_advtab: true,
              templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
              ],
              content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
              ],
                image_advtab: true,
                 statusbar:false,
                toolbar_items_size: 'small',
                height: "300",
                plugin_preview_width: 250
            });
        </script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <div id="main"> 
            <form role="form" action="confessdb.php" method="post" >
                <div class="input">
                    <label for="message">
                        <strong>Confess here</strong>
                    </label><br>
                    <textarea class="inpf" name="confmsg" rows="10" cols="10">
                    </textarea>
                </div>
                <div class="g-recaptcha" data-sitekey="6LfUPRsUAAAAAGgzv96APuiXYvUtxkHoUKs4pki7"></div>
                <input type="submit" class="btn btn-info" id="submission" value="Submit" name="submit">
            </form>
        </div>
    </body>
</html>
