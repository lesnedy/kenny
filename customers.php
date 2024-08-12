<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customer"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $age = $_POST["age"];

    // Insert data into the customers table
    $sql = "INSERT INTO customers (name, email, phone, age) VALUES ('$name', '$email', '$phone', $age)";
    
    if ($conn->query($sql) === TRUE) {
        echo "New customer added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
