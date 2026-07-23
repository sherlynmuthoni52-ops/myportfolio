<?php
// Include the database connection
require_once "db.php";

// ----------------------------
// Handle form submission
// ----------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $name    = $_POST['name']    ?? '';
    $email   = $_POST['email']   ?? '';
    $phone   = $_POST['phone']   ?? '';
    $message = $_POST['message'] ?? '';

    // Basic validation
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        die("Please fill in all fields.");
    }

    // Insert into the "contacts" table using a prepared statement
    // Change "contacts" below to match your actual table name if different
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $name, $email, $phone, $message);
    // Note: "sssi" assumes phone is int(11) like in your table.
    // If phone numbers may start with 0 or contain +/spaces/dashes, change the
    // phone column to varchar(20) and use "ssss" instead.

    if ($stmt->execute()) {
        echo "Message saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>