

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title></title>
</head>

<body>
<?php 
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db);
    if ($conexion->connect_error) die ("Fatal error");

    if(isset($_POST['gmail']) && isset($_POST['pass']))
    {
        $gmail= mysql_fix_string($conexion, $_POST['gmail']);
        $pass =($_POST['pass']);

        $query = "SELECT * FROM users WHERE gmail='$gmail' AND pass='$pass'";

        $result = $conexion->query($query);
        if ($result->num_rows >= 1)
           Echo "<center><br><br><br><br><br><br><br><br>
        <div class='imagen'><img src='jhuss2.png'></div><br>

        <a href='miDiario.php'>ESCRIBIR TU DIARIO</a>
        </center>";  
        else
        echo"<center><br><br><br><br><br>
                    USUARIO O PASSWORD INCORRECTO<br><br>
                    <div class='imagen'>
                   <img src='advertencia.png'>
                   </div><br>
                     <a href='registrar.php'>REGÍSTRATE</a>
                  </center><br>";

     }else{
        echo' <center><br><br><br><br>
                                      <h4> INICIAR SESIÓN</h4> 
                   <div class="imagen">
                   <img src="user.png">
                   </div>
     <form action="index.php" method="post"><br>

     <input class="texto" type="text" name="gmail" placeholder="Gmail"><br><br>
     <input class="texto" type="password" name="pass" placeholder="Password"><br><br>
     <input class="boton" type="submit" value="Iniciar Sesion"><br>
     </form></center>';

     echo '<center>
        <form action="registrar.php" method="post"><br><br>
        Si no eres uasuario registrate <br>
 <input class="boton" type="submit" value="Registrate Aqui"><br><br><br>';}



 
    function mysql_fix_string($coneccion, $string)
    {
        if (get_magic_quotes_gpc())
            $string = stripcslashes($string);
        return $coneccion->real_escape_string($string);
    }
    ?>
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