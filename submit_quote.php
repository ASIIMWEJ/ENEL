<?php

// Create a connection
$conn = new mysqli('localhost', 'root', '', 'firstproject');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Retrieve data from the HTML form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Step 3: Validate and sanitize user inputs (you should perform more extensive validation)
    $fname = mysqli_real_escape_string($conn, $fname);
    $lname = mysqli_real_escape_string($conn, $lname);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    $message = mysqli_real_escape_string($conn, $message);

    // Step 4: Insert data into the database
    $sql = "INSERT INTO  registration (fname, lname, email, phone, message) VALUES ('$fname', '$lname', '$email', '$phone', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Quote request submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No data submitted.";
}

// Step 6: Close the database connection
$conn->close();
?>
