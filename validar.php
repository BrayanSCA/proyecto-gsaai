<?php
$usuario=$_POST['documento'];
$pass=$_POST['contraseña'];
session_start();
$_SESSION['documento']=$usuario;

$conexion=mysqli_connect("localhost","root","","dbgsaai","3306");
    #if($conexion){
    #    echo 'Conexión exitosa';
    #}

$consulta="SELECT*FROM usuarios where documento='$usuario' and contraseña='$pass'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:home.php");

}else{
    ?>
    <?php
    include("index.html");
    ?>
    <h1 class="bad">Alguno de los datos es incorrecto, por favor intente de nuevo</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
