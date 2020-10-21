<?php


    if($_POST["submit"]){
        
        // recipient details
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $msg = $_POST["message"];
        $wrapmsg = wordwrap($msg,70,"<br>");
        
        echo <<<MSG
        $fname<br>
        $lname<br>
        $email<br>
        $wrapmsg
        MSG;
        
        
        /*
        $recipdetails = <<<EOT
        $fname
        $lname
        $email
        EOT;
        
        // the message
        $msg = $recipdetails . " " . $_POST["message"];

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email syntax mail(to,subject,message,headers,parameters)
        //mail("example@email.com","My subject",$msg);
        */
    }


?>