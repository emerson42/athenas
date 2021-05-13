<?php
        header('Content-Type: application/json');

        $conn = mysqli_connect("banco","root","phpens","athenas") or die (mysqli_error($conn));
        $sql = "SELECT a.codigo as codigo, a.nome as nome, a.email as email, a.codigoCategoria as codigoCategoria, b.nome as categoria
                FROM Pessoa a, Categoria b where a.codigoCategoria = b.codigo";
        $resultado = mysqli_query($conn, $sql) or die (mysqli_error($conn));

        while ($row = mysqli_fetch_array($resultado)) {
                $data = array();
                $data[] =  $row['codigo'];
                $data[] =  $row['nome'];
                $data[] =  $row['email'];
                $data[] =  $row['categoria'];
                $data[] =  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type='button' class='btn btn-success btn-sm' onclick='getSeleciona(" . $row['codigo']. ")'>Alterar</button>".
                "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='getSelecionaExcluir(" . $row['codigo']. ")'>Excluir</button>";
                $dados[] = $data;
        }
                
        $response = array (
                "aaData" => $dados
        );
        echo json_encode($response);

        $conn->close;
?>