<?php
include 'connectDb.php';

if (isset($_POST['submit'])) {
    $model = $_POST['model'];
    $color = $_POST['color'];
    $value = $_POST['value'];
    $image = $_FILES['image']['name'];

    if (!empty($model) && !empty($color) && !empty($value) && !empty($image)) {

        $sqlImage = "SELECT * FROM cars WHERE image = '$image'";
        $resultImage = mysqli_query($conn, $sqlImage);

        $sqlModel = "SELECT * FROM cars WHERE model = '$model'";
        $resultModel = mysqli_query($conn, $sqlModel);

        if (mysqli_num_rows($resultImage) >= 1 || mysqli_num_rows($resultModel) >= 1) {
            $row = mysqli_fetch_assoc($resultImage);
            $row1 = mysqli_fetch_assoc($resultModel);

            if (strtoupper($row1['model']) == strtoupper($model) && strtoupper($row['image']) == strtoupper($image)) {
                echo "<script>alert('Model and Image is already existing')</script>";
            } else if (strtoupper($row1['model']) == strtoupper($model)) {
                echo "<script>alert('model is already existing')</script>";
            } else if (strtoupper($row['image']) == strtoupper($image)) {
                echo "<script>alert('image is already existing')</script>";
            }

        } else if ($resultImage) {
            $sqlCreate = "INSERT INTO `cars` (model, color, value, image) VALUES ('$model','$color','$value','$image')";
            $resultCreate = mysqli_query($conn, $sqlCreate);

            if ($resultCreate) {
                move_uploaded_file($_FILES['image']['tmp_name'], "upload/" . $_FILES['image']['name']);
            }
        }
    } else {
        echo "<script>alert('Please Complete all fields')</script>";
    }
}
if (isset($_POST['cancel'])) {
    header("Location:http://localhost/practiceFolder/PHP/crud_file_upload/index.php");
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
                <button name="submit" class="btn btn-primary">Submit</button>
                <button name="cancel" class="btn btn-danger">Cancel</button>
            </div>
        </form>
    </div>
</body>

</html>