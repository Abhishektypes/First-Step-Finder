<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "green";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

// Check the connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql_query = "INSERT INTO contact (name, email, message)
                  VALUES ('$name', '$email', '$message')";

    if (mysqli_query($conn, $sql_query)) {
        // Redirect back to the form with a success flag
        header("Location: contact.php?success=1");
        exit(); // Make sure to exit after the redirect to stop further execution
    } else {
        echo "Error: " . $sql_query . " " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
