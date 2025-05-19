<?php

    // define variables and set to empty values
    $buyeremail = $buyerphone = $domainname = $companyname = $adminname = $adminemail = $ns1 = $ns2 = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $buyeremailclean    = test_input($_POST["buyeremail"]);
        $buyerphoneclean    = test_input($_POST["buyerphone"]);
        $domainnameclean    = test_input($_POST["domainname"]);
        $companynameclean   = test_input($_POST["companyname"]);
        $adminnameclean     = test_input($_POST["adminname"]);
        $adminemailclean    = test_input($_POST["adminemail"]);
        $ns1clean           = test_input($_POST["ns1"]);
        $ns2clean           = test_input($_POST["ns2"]);
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $utc        = gmdate("l jS \of F Y h:i:s A");
    $to         = "ceo@iconsolve.com";

    $subject    = ".GM Domain Purchase Information";

    $message    = "
    Dear Admin,\n 
    Please find below information on new .gm registration:\n
    Buyer Email Address: $buyeremailclean \n
    Buyer Phone Number: $buyerphoneclean \n

    Registrar name: Iconsolve\n

    Domain Name/s: $domainnameclean \n
    
    Admin contact person/role: $adminnameclean \n
    Admin contact org/company: $companynameclean \n
    Admin contact email: $adminemailclean \n

    Name Server #1: $ns1clean \n
    Name Server #2:  $ns2clean \n

    Regards, \n
    Iconsolve Admin\n
    $utc
    
    ";

    $headers = "From: support@iconsolve.com" . "\r\n" .

    "CC: officemanager@iconsolve.com";

    $send = mail($to,$subject,$message,$headers);

    if ($send) { ?>
        <script language="javascript" type="text/javascript">
         alert('Thank you for the message. We will contact you shortly.');
         window.location.href = 'index.php';
        </script>
        <?php
        }else { ?>
         <script language="javascript" type="text/javascript">
          alert('Message failed. Please, send an email to gordon@template-help.com');
          window.location.href = 'index.php';
         </script>
        <?php } ?>

?> 