<?php

    $vcodigo = $_POST['codigo'];
    $vnome = "'" . $_POST['nome'] . "'";
    $vemail = "'" . $_POST['email'] . "'";
    $vcategoria = "'" . $_POST['categoria'] . "'";

    $conn = mysqli_connect("banco","root","phpens","athenas") or die (mysqli_error($conn));
    $sql = "UPDATE Pessoa SET nome = $vnome, email = $vemail, codigoCategoria = $vcategoria WHERE codigo = $vcodigo";
   
    if ($conn->query($sql) === TRUE) {
        echo "alterado";
    }
    else {
        echo mysqli_error($conn);
    }
    
    $conn->close;

?>