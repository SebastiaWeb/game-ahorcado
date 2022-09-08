<?php
include './shared/connect.php';
include './shared/consultas.php';
$categoria = getCategoria($bd);
$succes = '';
if (isset($_GET['value'])) {
    $succes = $_GET['value'];
    echo 'Guardado';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet" />
</head>

<body>

    <h1>Agregar datos</h1>

    <section>
        <h3>Agregar Palabra: </h3>
        <form action="./shared/consultas.php" name="palabra" enctype="multipart/form-data">
            <label for="palabra"></label>
            <input type="text" name="palabra">
            <select name="categoria" id="">
                <option selected>Seleccione una opcion: </option>
                <?php foreach ($categoria as $i => $item) { ?>
                    <?php var_dump($item); ?>
                    <option value="<?php echo $i; ?>"> <?php echo $item['categoria']; ?> </option>
                <?php } ?>
            </select>
            <button type="submit">Enviar</button>
        </form>

        <?php echo $succes . ' ' . strcmp($succes, 'true');
        if (strcmp($succes, 'true') == 0) { ?>

            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                <strong>Guardado exitosamente!</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php } else if(strcmp($succes, 'false') == 0) { ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error</strong> No debe tener espacios, solo 11 caracteres.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php } ?>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>