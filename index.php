

<?php
$insert = false;
if(isset($_POST['fname'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nice";

// I am Creating a connection here with MySQL.
$conn = mysqli_connect($servername, $username, $password, $dbname);

// I am Checking connection here. 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
   // Collect post variables
   $fname = $_POST['fname'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $address = $_POST['address1'];
   $quantity = $_POST['quantity'];
// SQL query to inserting data in students table.

$sql = "INSERT INTO boys (fname, phone, email, address1, quantity, dt)
VALUES ('$fname', '$phone','$email', '$address', '$quantity', current_timestamp())";

if($conn->query($sql) == true){
    // echo "Successfully inserted";

    // Flag for successful insertion
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

// Close the database connection


mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            display: flex;
            flex-direction: column;
            background-color: #2200ff5c;
            padding: 40px;
        }

        h1 {
            display: flex;
            justify-content: center;
        }

        .btn {
            background-color: #09ff00;
            color: white;
            width: 200px;
            height: 35px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: bold;
            margin-left: 83px;
        }
        .submitMsg{
            color: #09ff00;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome To ApaNa DhaBa</h1>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <br>
        <br>
        <form action="" method="post">
            <label for="">Full Name</label>
            <input type="text" name="fname">
            <br> <br>
            <label for="">Phone Number</label>
            <input type="text" name="phone">
            <br> <br>
            <label for="email">Email</label>
            <input type="text" name="email">
            <br> <br>
            <label for="address">Address</label>
            <input type="text" name="address1">
            <br> <br>
            <label for="address">Quantity</label>
            <input type="number" name="quantity">
            <br> <br>
            <input type="submit" class="btn" name="submit" value="Order Now">
        </form>
    </div>
</body>

</html>

<!-- INSERT INTO `order` (`sno.`, `fname`, `phone`, `email`, `address`, `quantity`, `dt`) 
VALUES ('1', 'deepak', '1234', 'example@gmail.com', 'bihar', '1', '2022-03-06 11:34:08.000000'); -->