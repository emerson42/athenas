<?php

    $vcodigo = $_POST['codigo'];

    echo json_encode($vcodigo);
    
    
    $rows = array();

    $conn = mysqli_connect("banco","root","phpens","athenas") or die (mysqli_error($conn));
    $sql = "DELETE FROM Pessoa WHERE codigo = $vcodigo";
    $resultado = mysqli_query($conn, $sql) or die (mysqli_error($conn));

    echo $resultado;

?>