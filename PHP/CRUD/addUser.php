<?php
include 'db_connect.php';

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phonenumber = $_POST['phonenumber'];


    if(!empty($firstname) && !empty($lastname) && !empty($phonenumber)){
        
    $query = "SELECT * FROM users WHERE phonenumber = '$phonenumber'";
    $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) >= 1){
            $row = mysqli_fetch_assoc($result);

            if($row['phonenumber'] == $phonenumber){
                echo '<script>alert("Phone Number is already exist")</script>';
            } 

        } else if($result){
            $createNewUser = "INSERT INTO `users` (firstname,lastname,phonenumber) VALUES('$firstname', '$lastname', '$phonenumber')";
            $createNewUserResult = mysqli_query($conn, $createNewUser);

            echo '<script>
            if(confirm("Successful! Do you want to make a new one?")){
                location.href = "http://localhost/practiceFolder/addUser.php";
            }else{
                location.href = "http://localhost/practiceFolder/index.php";
            }</script>';
        }
    } else{
        echo '<script>alert("Please Complete all input fields")</script>';
    }

}

if(isset($_POST['cancel'])){
    header('Location:http://localhost/practiceFolder/index.php');
}

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


<div class="container">
    <br><br>
    <form class="form-control" method="POST">
        <h1>Add Phone Number</h1>
        <label for="firstname" class="form-label">First Name</label>
          <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your first name" autocomplete="off">
        <label for="lastname" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your last name" autocomplete="off">
        <label for="phonenumber" class="form-label">Phone Number</label>
           <input type="number" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter your phone number" autocomplete="off">
        <br>
        <button class="btn btn-primary" name="submit">Submit</button>
        <button class="btn btn-danger" name="cancel">Cancel</button>
        <br><br>
    </form>
</div>