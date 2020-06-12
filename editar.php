<?php
    if(isset($_GET['editar'])){
        $editar_id = $_GET['editar'];

        $consulta = "SELECT * FROM usuarios WHERE id = '$editar_id'";
        $ejecutar = mysqli_query($con, $consulta);

        $fila = mysqli_fetch_array($ejecutar);

        $nombre = $fila['nombre'];
        $apellido = $fila['apellido'];
        $email = $fila['email'];

    }

?>

<br>

<form method="POST" action  " " >
<input type="text" name=" nombre" value = "<?php echo $nombre; ?>"> <br>
<!-- esto me traera desde la bd el nombre del usuario-->
<input type="text" name=" apellido" value = "<?php echo $apellido; ?>"> <br>
<input type="text" name=" email " value = "<?php echo $email; ?>"> <br>
<input type="submit" name=" actualizar" value = "Actualizar Datos">

</form>

<?php 
   $actulizar_nombre = $_POST['nombre'];
   $actulizar_apellido = $_POST['apellido'];
   $actulizar_email = $_POST['email'];
    

   $actualizar = " UPDATE usuarios SET nombre = '$actualizar_nombre', apellido = '$actualizar_apellido', email = '$actualizar_email', WHERE id = '$editar_id' ";
   
   $ejecutar = mysqli_query($con, $actualizar);

   if($ejecutar){}
    echo "<script> alert('Datos actualizados')</script>";
    echo "<script> window.open('curd.php')</script>";
    

?>