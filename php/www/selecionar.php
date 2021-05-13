<?php

    $vcodigo = "'" . $_GET['codigo'] . "'";

    $rows = array();

    $conn = mysqli_connect("banco","root","phpens","athenas") or die (mysqli_error($conn));
    $sql = "SELECT * FROM Pessoa WHERE codigo = $vcodigo";
    $resultado = mysqli_query($conn, $sql) or die (mysqli_error($conn));

    while ($row = mysqli_fetch_array($resultado)) {
            $rows[0] = $row['codigo'];
            $rows[1] = $row['nome'];
            $rows[2] = $row['email'];    
            $rows[3] = $row['codigoCategoria'];    
    }
    $response = array (
        "aaData" => $rows
    );

    echo json_encode($response);
?>