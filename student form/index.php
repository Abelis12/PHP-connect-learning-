<?php
// Connect to cgfkdb
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cgfkdb';
// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed !" . $conn->connect_error);
} else {
    echo "Connection Successful";
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Retrieve form data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query time (insert into the database)
    $sql = "INSERT INTO std (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Record success";
    } else {
        echo "Error" . $sql . "<br>" . $conn->error;
    }
}



// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <style>
        .btn {
            background-color: blue;
            color: #fff;
            height: 50px;
            width: 100px;
            border-radius: 50px;
        }
    </style>
</head>
<body>
    <center>
        <b><h3>Registration form</h3></b>
        <hr>
        <form action="" method="post">
            <label style="color: brown;" for="First Name">First Name </label>
            <input style="height: 40px; width: 160px; border-radius: 50px;" type="text" name="fname" placeholder="Firstname" required> <br><br>
            <label style="color: brown;" for="Last Name">Last Name </label>
            <input style="height: 40px; width: 160px; border-radius: 50px;" type="text" name="lname" placeholder="Lastname" required> <br><br>
            <label style="color: brown;" for="Email">Email </label>
            <input style="height: 40px; width: 160px; border-radius: 50px;" type="email" name="email" placeholder="Email" required> <br><br>
            <label style="color: brown;" for="Password">Password </label>
            <input style="height: 40px; width: 160px; border-radius: 50px;" type="password" name="password" placeholder="password" required>
            <hr>
            <button class="btn" name="submit" type="submit">Submit</button>
        </form>
    </center>
</body>
</html>

