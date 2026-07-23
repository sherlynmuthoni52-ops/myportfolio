<?php
// ----------------------------
// Database connection settings
// ----------------------------
$host = "localhost";       // usually "localhost" on most hosting/XAMPP setups
$db_name = "your_database_name";  // <-- change to your actual database name
$username = "root";        // <-- change to your MySQL username
$password = "";            // <-- change to your MySQL password

// Create connection using mysqli
$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ----------------------------
// Handle form submission
// ----------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get and sanitize form data
    $name    = $conn->real_escape_string($_POST['name']);
    $email   = $conn->real_escape_string($_POST['email']);
    $phone   = $conn->real_escape_string($_POST['phone']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert into the table using a prepared statement (safer than real_escape_string alone)
    $stmt = $conn->prepare("INSERT INTO messages (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $name, $email, $phone, $message);
    // Note: "sssi" assumes phone is an integer column (int(11)) like in your table.
    // If phone numbers can start with 0 or contain +, change the phone column type to varchar
    // and update the bind_param type string to "ssss" instead.

    if ($stmt->execute()) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>