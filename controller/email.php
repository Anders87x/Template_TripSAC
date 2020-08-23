<?php
    require_once("../models/Email.php");
    $email = new Email();

    switch($_GET["op"]){

        case "send_alerta":
            $email->enviar($_POST["nom"],$_POST["cel"],$_POST["correo"],$_POST["mensaje"]);
        break;
 
    }
?>