<?php 
include 'db_connect.php';

$id = $_GET['id'];

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phonenumber = $_POST['phonenumber'];

    $updateUser = "UPDATE `users` SET firstname = '$firstname', lastname = '$lastname', phonenumber = '$phonenumber' WHERE id = $id";
    $updateUserResult = mysqli_query($conn, $updateUser);

    if($updateUserResult){
        echo '<script>
            if(confirm("Successfully updated")){
                location.href = "http://localhost/practiceFolder/index.php";
        }
        </script>';
    } 
}

if(isset($_POST['cancel'])){
    header('Location:http://localhost/practiceFolder/index.php');
}

$userInfo = "SELECT * FROM users WHERE id = $id";
$userInfoResult = mysqli_query($conn, $userInfo);


?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<div class="container">
    <br><br>
    <form class="form-control" method="POST">
        <h1>Update User</h1>
        <?php 
        if($userInfoResult){
            $row = mysqli_fetch_assoc($userInfoResult);
        }
        ?>
        <label for="firstname" class="form-label">First Name</label>
          <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your first name" autocomplete="off" value="<?php echo $row['firstname']?>" >
        <label for="lastname" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your last name" autocomplete="off" value="<?php echo $row['lastname']?>" >
        <label for="phonenumber" class="form-label">Phone Number</label>
           <input type="number" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter your phone number" autocomplete="off" value="<?php echo $row['phonenumber']?>" >
        <br>
        <button class="btn btn-primary" name="submit">Submit</button>
        <button class="btn btn-danger" name="cancel">Cancel</button>
        <br><br>
    </form>
</div>
