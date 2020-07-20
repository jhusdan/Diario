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
    if(isset($_POST['titulo']) &&isset($_POST['fecha'])&& isset($_POST['descripcion'])){

    $titulo=$_POST['titulo'];
    $fecha=$_POST['fecha'];
    $descrip=$_POST['descripcion'];

    $query="UPDATE diario SET titulo='$titulo' ,fecha='$descrip', descripcion='$descrip'
    WHERE titulo='$titulo' AND fecha='$descrip' AND descripcion='$descrip'";
    
    $result = $conexion->query($query);
    If (!$result) die("Error fatal al edita");}

    $query = "SELECT * FROM diario";
    $result = $conexion->query($query);
    If (!$result) die("Error fatal consulta");
    $filas = $result->num_rows;
    for ($j = 0; $j < $filas; ++$j){

        $fila = $result->fetch_array(MYSQLI_ASSOC);

        echo '<center><br><br>MI DIARIO ESCRITAS</center>';
        echo "<center><br><br></center>";
        echo '<center>titulo: ' . htmlspecialchars($fila['titulo']) . '<br></cenetr>';
        echo '<center>fecha: ' . htmlspecialchars($fila['fecha']) . '<br></cenetr>';
        echo '<center>descripcion: ' . htmlspecialchars($fila['descripcion']).'</cenetr>' ;
        echo'<center>
                                               <h3>EDITA TU DIARIO </h3>
    <form action="mostrarN.php"method="post">
         <input class="texto"type="text" name="titulo"placeholder="Titulo"> <input class="texto" type="text" name="fecha"placeholder="Fecha"><pre>
          <textarea name="descripcion" cols="60" rows="8" wrap="off" placeholder="¿Que paso hoy dia?"></textarea><br><br>
          <input class="boton" type="submit" value="EDITAR DIARIO" >
          </cenetr>';
          }
          echo "<center>
   <form action='miDiario.php' method='post'>
           <input class='boton' type='submit' value=' SALIR'></form> <br><br><br> 
  </center>";
     
    
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
    
.texto{
margin: 0;
padding:0 20px;
background-color:# 3b4652;
opacity:45;
text-align: center;
font-size:12px;
border-radius:10px;
width:80px;
height:25px;
}
.boton{
border:none;
outline:none;
width:200px;
height:30px;
background:#42C7FF ;
color:#000;
font-size:10px;
border-radius:10px;}
}
</style>
</body>
</html>