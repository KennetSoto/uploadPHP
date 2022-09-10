<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    fieldset {
      display: inline-block;
      background-color: white;
    }

    body {
      text-align: center;
      background-color: green;
    }
  </style>
</head>

<body>

  <fildset>
  <?php
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["ImgToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


  if (file_exists($target_file)) {
    echo "Desculpe, esse arquivo ja existe.";
    echo '<br>';
    $uploadOk = 0;
  }

  if ($_FILES["ImgToUpload"]["size"] > 500000) {
    echo "Desculpe, esse arquivo é muito grande.";
    echo '<br>';
    $uploadOk = 0;
  }

  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo "Desculpe, somente aruivos JPG, JPEG, PNG & GIF são permitidos.";
    echo '<br>';
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "Desculpe, seu arquivo não foi enviado.";
    echo '<br>';
  } else {
    if (move_uploaded_file($_FILES["ImgToUpload"]["tmp_name"], $target_file)) {
      echo "O arquivo " . htmlspecialchars(basename($_FILES["ImgToUpload"]["name"])) . " foi enviado.";
    } else {
      echo "Desculpe, ocorreu um erro ao enviar seu arquivo.";
    }
  }

  echo '<br>';
  echo "<img src='uploads/" . $_FILES['ImgToUpload']['name'] . "' width= '340'>";

  ?>
  </fildset>

</body>

</html>