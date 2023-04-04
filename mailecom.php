<?php

 
  
      //$to = $_POST['email']; 
      //$message= $_POST['message'];
      
      $message='hello';
      //$to = 'kush@gameskraftcafe.in';
      $to = 'rajat.s@gameskraft.com';
      $subject =   "Tuck Shop Order ID ".$_POST['order'];
      $header .= "MIME-Version: 1.0\r\n";
      $header .= "Content-type: text/html\r\n";
      $header = "From:info@gameskraftcafe.in\r\n";
      $header .= "Cc:Games Kraft\r\n";
      $header .= "MIME-Version: 1.0\r\n";
      $header .= "Content-type: text/html\r\n";
      $retval = mail ($to,$subject,$message,$header);  


       ?>