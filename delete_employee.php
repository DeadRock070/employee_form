<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    // Fetch the profile picture path to delete the file
    $sql = "SELECT profile_picture FROM employees WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $profile_picture = $row['profile_picture'];

        // Delete the profile picture file if it exists
        if (!empty($profile_picture) && file_exists($profile_picture)) {
            unlink($profile_picture);
        }

        // Delete the employee record from the database
        $sql = "DELETE FROM employees WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "No record found with ID: $id";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
