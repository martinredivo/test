<?php
/*este es el codigo agregado*/
class PHP_Email_Form {

    function add_message()
    {
    $toEmail = "info@ecomsultores.com";
    $mailHeaders = "From: " . $_POST["name"] . "<". $_POST["email"] .">\r\n";
    if(mail($toEmail, $_POST["subject"], $_POST["message"], $mailHeaders)) {
        print "<p class='success'>Mail Sent.</p>";
        } else {
        print "<p class='Error'>Problem in Sending Mail.</p>";
        }
    }
}
?>