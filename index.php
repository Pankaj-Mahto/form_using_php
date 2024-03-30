<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server,$username,$password);


    if(!$con) {
        die("connection to this database failed due to" .mysqli_connect_error());

    }
    //echo "Success connecting db";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    //echo $sql;


    if($con->query($sql) == true) {
       // echo "Successfully inserted";
       $insert = true;
    }
    else {
        echo "ERROR: $sql <br> $conn->error";
    }

    $con->close();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpeg" alt="trip form">
    <div class="container">
        <h1>A trip submittion form</h1>
        <p>Interested students can fill this form </p>

        <?php
            if($insert == true) {
            echo "<p class='submit_msg'>Thank you for filling the form and your interest</p>";
            }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
            <button class="btn">Submit</button>
    

        </form>
    </div>
    <script src="index.js"></script>


    

</body>
</html>