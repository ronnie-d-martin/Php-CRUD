<?php
include 'connectDb.php';

if(isset($_POST['submit'])){
    $model = $_POST['model'];
    $color = $_POST['color'];
    $value = $_POST['value'];
    $image = $_FILES['image']['name'];

    $sqlCreate = "INSERT INTO `cars` (model, color, value, image) VALUES ('$model','$color','$value','$image')";
    $resultCreate = mysqli_query($conn, $sqlCreate);

    if($resultCreate){
        move_uploaded_file($_FILES['image']['tmp_name'], "upload/".$_FILES['image']['name']);
    }
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Cars</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Add Cars</h1>
        <form action="addCars.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" class="form-control" name="model" placeholder="Enter model here...">
                <label for="color">Color</label>
                <input type="text" class="form-control" name="color" placeholder="Enter color here...">
                <label for="value">Value</label>
                <input type="number" class="form-control" name="value" placeholder="Enter value here...">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control">
                <br>
                <input type="submit" name="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>

</html>