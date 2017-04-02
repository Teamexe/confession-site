<?php
  require_once('recaptchalib.php');
  $privatekey = "6LfUPRsUAAAAAJIbNy_R1be55PD8VY5ggJEhhss7";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) 
  {
    echo "captcha is working";
    
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again."."(reCAPTCHA said: ".$resp->error .")");
  } 
  else 
  {
    echo "captcha is not working";
  }
  ?>