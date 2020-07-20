
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
        $gmail = $_POST['gmail'];
        $pass = $_POST['pass'];

        $query = "INSERT INTO users VALUES('$gmail','$pass')";
        $result = $conexion->query($query);
        if (!$result) die ("Falló registro");

        echo "<center><br><br><br><br>
        Registro exitoso <br><br> 
        <a href='index.php'>INICIAR SESION</a>
        </center>";
      
    }else{
        echo' <center><br><br><br><br>
                           <h3>Regístrate</h3>
     <form action="registrar.php" method="post"><pre><br><br> 
     <input class="texto" type="text" name="gmail" placeholder="Gmail"><br>
     <input class="texto" type="text" name="pass" placeholder="Password"><br><br><br><br>
     <input class="boton" type="submit" value="Registrar"><br><br>
     </form>
             </center>';
} 
?>
<style>
body{
    margin:0;
    padding:0;
    background: url(bienvinido2.jpg);
    background-size: cover;
    background-position: cenetr;
    font-family: sans-serif;
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
width:200px;
height:30px;
background:#30CC00;
color:#000;
font-size:10px;
border-radius:10px;}

.h3{
margin: 0;
padding: 0 0 20px;
text-align:cenetr;
font-size:12px;
display: arial;
}
</style>
</body>
</html>