<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["pdfToUpload"]["name"]);
    $uploadOk = 1;
    $pdfFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        echo "Desculpe, esse arquivo ja existe.";
        echo '<br>';
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Desculpe, seu arquivo não foi enviado.";
        echo '<br>';

    } else {
        if (move_uploaded_file($_FILES["pdfToUpload"]["tmp_name"], $target_file)) {
            echo "O arquivo " . htmlspecialchars(basename($_FILES["pdfToUpload"]["name"])) . " foi enviado.";
        } else {
            echo "Desculpe, ocorreu um erro ao enviar seu arquivo.";
        }
    }

    echo '<br>';
   
    echo 'Link: <a ref="http://localhost/adsltp/trabUpload/UploadPDF/uploads/">Upload</a>';

    ?>
</body>
</html>