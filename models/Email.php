<?php
    require('class.phpmailer.php');
    include("class.smtp.php");

    class Email extends PHPMailer{
        
        public function enviar($nom,$cel,$correo,$mensaje){
            $this->IsSMTP();
            $this->Host = 'smtp.office365.com';
            $this->Port = 587;
            $this->SMTPAuth = true;
            $this->Username = $this->tu_email="<Doc aqui tu correo>";
            $this->Password = $this->tu_password="<Doc aqui tu contraseña>";
            $this->SMTPSecure = 'tsl';
            $this->From = $this->tu_email;
            $this->CharSet='UTF8';
            $this->addAddress('davis_anderson_87@hotmail.com');//Aqui el correo a donde va a llegar la alerta
            $this->WordWrap = 50;
            $this->IsHTML(true);
            $this->Subject = "Alerta";
                $cuerpo = file_get_contents('../public/alerta.html');
                $cuerpo = str_replace('lblnomx',$nom,$cuerpo);
                $cuerpo = str_replace('lblcelx',$cel,$cuerpo);
                $cuerpo = str_replace('lblcorreox',$correo,$cuerpo);
                $cuerpo = str_replace('lblmensajex',$mensaje,$cuerpo);
            $this->Body = $cuerpo;
            $this->IsHTML(true);
            return $this->Send();
        }
    }
?>