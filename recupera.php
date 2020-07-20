
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <form action="index.php" method="POST">
            <input type="text" name="email" value="" placeholder="email" /> <br/>
            <input type="submit" value="Recordar contraseña" />
        </form>
         <?php
          //Conexion con la base
          
          require_once 'login.php';
                 $conexion = new mysqli($hn, $un, $pw, $db);
                 if ($conexion->connect_error) die ("Fatal error");

		try{
			if(isset($_POST['gmail']) && !empty($_POST['eail gmail'])){

                $pass = substr( md5(microtime()), 1, 10);
                $gmail = $_POST['gmail'];

                $sql = "Update users Set password='$pass' Where correo='$gmail'";

                if ($conn->query($sql) === TRUE) {
                    echo "usuario modificado correctamente ";
                } else {
                    echo "Error modificando: " . $conn->error;
                }
                
                $query = $_POST['gmail'];//"destinatario@email.com";
                $from = "From: " . "Masterhouse" ;
                $subject = "Recordar contraseña";
                $message = "El sistema le asigno la siguiente clave " . $pass;

                mail($query, $subject, $message, $from);
                echo 'Correo enviado satisfactoriamente a ' . $_POST[' gmail'];
            }
            else 
                echo 'Informacion incompleta';
		}
		catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}
            
        ?>
    </body>

    
<style>
body{
    margin:0;
    padding:0;
    background: url(bienvinido1.png) no-repeat center fixed;
    background-size: cover;
    background-position: cenetr;
    font-family: sans-serif;
}
.imagen{
    
width:-180px;
height:-25px;
}
.texto{
margin: 0;
padding:0 20px;
background-color:# 3b4652;
opacity:45;
text-align: center;
font-size:12px;
border-radius:10px;
width:180px;
height:25px;
}
.boton{
border:none;
outline:none;
width:150px;
height:25px;
background:#42C7FF ;
color:#000;
font-size:10px;
border-radius:10px;}

.h4{
margin: 0;
padding: 0 0 20px;
text-align:cenetr;
font-size:12px;
display: algerian;
}
.h6{
margin: 0;
padding: 0 0 20px;
text-align:cenetr;
font-size:12px;
display: algerian;
}


</style>
</body>
</html>