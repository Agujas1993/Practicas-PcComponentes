<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Recuperar Contraseña</title>
    </head>
    <body>
        
        <form action="recuperarContraseña.php" method="POST">
            <input type="email" name="email" value="" placeholder="email" /> <br/>
            <input type="submit" value="Recordar contraseña" />
        </form>
        
        <?php
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require "connection.php";
		try{
			if(isset($_POST['email']) && !empty($_POST['email'])){
                $pass = substr( md5(microtime()), 1, 10);
                $mail = $_POST['email'];
                
               
                // Check connection
                if ($connect->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                
                $sql = "Update usuarios Set password='$pass' Where usuario='$mail'";

                if ($conn->query($sql) === TRUE) {
                    echo "usuario modificado correctamente ";
                } else {
                    echo "Error modificando: " . $conn->error;
                }
                
                $to = $_POST['email'];//"destinatario@email.com";
                $from = "From: " . "ElectroSubastas" ;
                $subject = "Recordar contraseña";
                $message = "El sistema le ha asignado la siguiente clave " . $pass;

                mail($to, $subject, $message, $from);
                echo 'Correo enviado satisfactoriamente a ' . $_POST['email'];
            }
            else 
                echo 'Informacion incompleta';
		}
		catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}
            
        ?>
    </body>
</html>