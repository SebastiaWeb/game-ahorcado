<?php
include 'connect.php';

function getCategoria($bd)
{
    $result = mysqli_query($bd, "SELECT * FROM categoria");
    if ($result) {
        return $result;
    } else {
        return null;
    }
}

function getCategoriaJson($bd)
{
    $result = mysqli_query($bd, "SELECT * FROM categoria");
    if ($result) {
        $result_json = [];
        foreach ($result as $i => $item) {
            $result_json[$i] = [
                'idcategoria' => $item['idcategoria'],
                'categoria' => $item['categoria']
            ];
        }
        return $result = json_encode($result_json, JSON_PRETTY_PRINT);
    } else {
        return null;
    }
}

function getPalabra($bd)
{
    $result = mysqli_query($bd, "SELECT * FROM palabra");
    if ($result) {
        $result_json = [];
        foreach ($result as $i => $item) {
            $result_json[$i] = [
                'palabra' => $item['palabra'],
                'idCategoria' => $item['categoria_idcategoria']
            ];
        }
        return $result = json_encode($result_json, JSON_PRETTY_PRINT);
    } else {
        return null;
    }
}

if (isset($_GET['palabra'])) {
    // echo 'existe';
    $pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚ]+$/";
    $palabra = $_GET['palabra'];

    // PRUEBA
    $first_example = $palabra;


    $valid = isValid($first_example) ? 'valid' : ' invalid ';


    if (!strpos($valid, 'valid')) {


        if (strpos($palabra, " ")) {
            header('Location: https://would-be-deliveries.000webhostapp.com/admin.php?value=false');
        }

        if (intval(strlen($palabra)) >= 11) {
            echo ($palabra <= 11);
            header('Location: https://would-be-deliveries.000webhostapp.com/admin.php?value=false');
        } else {
            $idCategoria = intval($_GET['categoria']) + 1;
            $result = mysqli_query($bd, "INSERT INTO palabra(palabra, categoria_idcategoria) VALUES ('$palabra', '$idCategoria')");

            if ($result) {
                header('Location: https://would-be-deliveries.000webhostapp.com/admin.php?value=true');
            } else {
                echo "Error: " . $result . "<br>" . $bd->error;
            }
        }
    } else {
        header('Location: https://would-be-deliveries.000webhostapp.com/admin.php?value=false');
    }

    // echo soloLetras($palabra);

}

function isValid($text)
{
    $pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚ]+$/";
    return preg_match($pattern, $text);
}
