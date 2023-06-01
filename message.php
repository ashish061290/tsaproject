<?php require 'config/config.php';
      require 'lib/BaseModal.php';
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $recaptchaResponse = $_POST['g-recaptcha-response'];
      $secretKey = '6LezFT0dAAAAAHyFrAM-cydJt05Qy3WS9UHJJ-R3'; // Replace with your secret key from the reCAPTCHA admin console
      $url = 'https://www.google.com/recaptcha/api/siteverify';
      $data = [
          'secret' => $secretKey,
          'response' => $recaptchaResponse,
          'remoteip' => $_SERVER['REMOTE_ADDR']
      ];
      $options = [
          'http' => [
              'header' => "Content-type: application/x-www-form-urlencoded\r\n",
              'method' => 'POST',
              'content' => http_build_query($data)
          ]
      ];
      $context = stream_context_create($options);
      $result = file_get_contents($url, false, $context);
      $response = json_decode($result);
      if ($response->success){
         $data = array("name"=>$_POST['name'],"email"=>$_POST['email'],"service"=>$_POST['service'],"mobile"=>$_POST['phone'],"message"=>$_POST['message']);
         $success = $Base->SaveEdit($data,null,null,'enquiry');
         echo 1;
      } else {
          echo 3;
      }
    } else {
       echo 2;
    }  ?>