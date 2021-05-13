<?php

    $vnome = "'" . $_POST['nome'] . "'";
    $vemail = "'" . $_POST['email'] . "'";
    $vcategoria = "'" . $_POST['categoria'] . "'";

    //echo $vnome

    $conn = mysqli_connect("banco","root","phpens","athenas") or die (mysqli_error($conn));
    $sql = "INSERT INTO Pessoa VALUE(0, $vnome, $vemail, 1)";
    if ($conn->query($sql) === TRUE) {
        $ultimo = $conn-> insert_id;
        echo "salvo no" . $ultimo;
    }
    else {
     echo "erro";
    }

    $conn->close;

?>