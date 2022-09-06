<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["ImgToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["ImgToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "Este arquivo é uma imagem - " . $check["mime"] . ".";
    echo '<br>';
    $uploadOk = 1;
  } else {
    echo "Este arquivo não é uma imagem.";
    echo '<br>';
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Desculpe, esse arquivo ja existe.";
  echo '<br>';
  $uploadOk = 0;
}

// Check file size
if ($_FILES["ImgToUpload"]["size"] > 500000) {
  echo "Desculpe, esse arquivo é muito grande.";
  echo '<br>';
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Desculpe, somente aruivos JPG, JPEG, PNG & GIF são permitidos."; 
  echo '<br>';
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Desculpe, seu arquivo não foi enviado.";
  echo '<br>';

// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["ImgToUpload"]["tmp_name"], $target_file)) {
    echo "O arquivo ". htmlspecialchars( basename( $_FILES["ImgToUpload"]["name"])). " foi enviado.";
  } else {
    echo "Desculpe, ocorreu um erro ao enviar seu arquivo.";
  }
}

echo '<br>';
echo "<img src='uploads/". $_FILES['ImgToUpload']['name']."' width= '340'>";

?>

</body>
</html>