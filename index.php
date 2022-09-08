<?php 
    include './shared/connect.php';
    include './shared/consultas.php';

    $result_palabra = getPalabra($bd);
    $result_categoria = getCategoriaJson($bd);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahorcado</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet" />
</head>

<body>

    <main class="container d-flex d-flex justify-content-between align-items-center main-ahorcado">
        <div id="img">
            <img src="./asset/1.jpg" alt="" srcset="" id="imgError">
        </div>
        <div id="categoria">
            <h3 id="mostrarCategoria">Categoria</h3>
            <span id="text_complete"></span>

            <div>
                <h4 id="vida">OPORTUNIDADES: 0</h4>
            </div>
            <input type="text" placeholder="Letra" id="inputLetra" minlength="1" maxlength="1">
            <button id="btnAgregar">Agregar</button>
        </div>
    </main>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
        window.globalPalabra = <?php echo $result_palabra;?>;
        window.categoria = <?php echo $result_categoria;?>;
    </script>
    <script src="./index.js"></script>
</body>

</html>