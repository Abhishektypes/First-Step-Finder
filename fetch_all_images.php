<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all image paths from the database
$sql = "SELECT image_path FROM images ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through the images and display them
    while ($row = $result->fetch_assoc()) {
        $image_path = $row['image_path'];

        // Check if the file exists
        if (file_exists($image_path)) {
            echo '<div class="col-md-4 mb-4">';
            echo '<img src="' . $image_path . '" alt="User Uploaded Image" class="img-fluid rounded">';
            echo '</div>';
        }
    }
} else {
    echo '<p>No images uploaded yet.</p>';
}

// Close the connection
$conn->close();
?>
