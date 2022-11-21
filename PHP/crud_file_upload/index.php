<?php
include 'connectDb.php';

if(isset($_GET['addUser'])){
    header("location:addCars.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>CRUD</h1>
        <a href="index.php?addUser"><button class="btn btn-primary">New Cars</button></a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Model</th>
                    <th scope="col">Color</th>
                    <th scope="col">Value</th>
                    <th scope="col">Image</th>
                    <th scope="col" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
<?php 
    $sqlRead = "SELECT * FROM cars";
    $resultRead = mysqli_query($conn,$sqlRead);

    if(mysqli_num_rows($resultRead) > 0){
        while($row = mysqli_fetch_assoc($resultRead)){
            echo ' <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['model'].'</td>
                    <td>'.$row['color'].'</td>
                    <td>'.$row['value'].'</td>
                    <td><img src="upload/'.$row['image'].'" alt="Muscle cars" width="150" height="100"/></td>
                    <td>
                        <input type="hidden" value='.$row['id'].'>
                        <button class="btn btn-info">Edit</button>
                    </td>
                    <td>
                        <input type="hidden" value='.$row['id'].'>
                        <button class="btn btn-danger" >Delete</button>
                    </td>
                  </tr>';
        }
    } else{
        echo "<tr>
           <td colspan='5'>Empty Table</td>
        </tr>";
    }
?>
            </tbody>
        </table>
    </div>
</body>

</html>