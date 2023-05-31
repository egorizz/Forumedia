<?php
include 'settings.php';

$id = $_GET['id'];

$query = "SELECT * FROM news WHERE id = $id";
$result = $mysqli->query($query);
$row = $result->fetch_assoc();

$mysqli->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $row['title']; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-5"><?php echo $row['title']; ?></h1>
        <p class="lead"><?php echo $row['content']; ?></p>
        <a href="index.php" class="btn btn-primary">Все новости</a>
    </div>
</body>

</html>