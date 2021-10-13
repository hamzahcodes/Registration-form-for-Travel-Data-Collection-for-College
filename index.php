<?php
$insert = false;
if(isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($server, $username, $password);

    if(!$conn) {
        die("Connection to the db failed" . mysqli_connect_error());
    }
    // echo "Connection to the db is successfull";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $details = $_POST['desc'];

    $sql = "INSERT INTO `phpConnection`.`traveldetails` (`name`, `age`, `gender`, `email`, `phone`, `description`, `dd`) 
    VALUES ('$name', '$age', '$gender', '$email', '$phone', '$details', current_timestamp())";
    
    // echo $sql;

    if($conn->query($sql) == true) {
        // echo "Successfully inserted";
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $conn->error";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Confirmation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Nature" >
    <div class="container">
        <h1>Welcome to Travel form of TSEC</h1>
        <p>This information will be used to get details of your travel and confirm your travel</p>

        
        <form action="index.php" method="post">

            <input type="text" name="name" id="name" placeholder="Enter your name"><br>
            <input type="text" name="age" id="age" placeholder="Enter your age"><br>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender"><br>
            <input type="email" name="email" id="email" placeholder="Enter your email"><br>
            <input type="text" name="phone" id="phone" placeholder="Enter your Phone no."><br>
            <textarea name="desc" id="desc" cols="30" rows="12" placeholder="Enter any other info"></textarea>
            <button type="submit" class="btn">Submit</button>
            <button type="reset" class="btn">Reset</button>
        </form>

        <?php
            if($insert == true) {
                echo "<p class='submitMsg'>Thank you for submitting the form. We hope you enjoy your trip.</p>";
            }
            $insert = false;
        ?>
    </div>
    <script src="index.js"></script>
</body>
</html>

