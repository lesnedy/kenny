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
    $customer_id = $_POST["customer_id"];
    $order_date = $_POST["order_date"];
    $order_amount = $_POST["order_amount"];
    $discrption=$_POST["disc"];

    // Insert data into the orders table
    $sql = "INSERT INTO orders (customer_id, order_date, order_amount) VALUES ($customer_id, '$order_date', $order_amount)";
    
    if ($conn->query($sql) === TRUE) {
        echo "New order added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
