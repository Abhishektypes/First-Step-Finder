<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
$dsn = "mysql:host=localhost;dbname=login_system";
$username = "root";
$db_password = "";

try {
    // Establish a connection to the database
    $conn = new PDO($dsn, $username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if all fields are filled
        if (isset($_POST['email'], $_POST['password'], $_POST['confirm_password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Check if passwords match
            if ($password !== $confirm_password) {
                die("Passwords do not match.");
            }

            // Hash the password
            //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Begin a transaction to ensure both queries succeed or both fail
            $conn->beginTransaction();

            // Prepare the SQL query to insert into users table
            $sql_users = "INSERT INTO users (email, password) VALUES (:email, :password)";
            $stmt_users = $conn->prepare($sql_users);
            $stmt_users->bindParam(':email', $email);
            $stmt_users->bindParam(':password', $password);

            // Prepare the SQL query to insert into already table
            // Assuming already table has the same fields: email and password
            $sql_already = "INSERT INTO already (email, password) VALUES (:email, :password)";
            $stmt_already = $conn->prepare($sql_already);
            $stmt_already->bindParam(':email', $email);
            $stmt_already->bindParam(':password', $password);

            // Execute both queries
            if ($stmt_users->execute() && $stmt_already->execute()) {
                // Commit the transaction if both queries succeed
                $conn->commit();
                
                // Redirect to index.html with a success message
                echo "<script>
                        alert('Data sent successfully!');
                        window.location.href = 'index.html';
                      </script>";
            } else {
                // Rollback the transaction if either query fails
                $conn->rollBack();
                echo "Error: Unable to execute the queries.";
            }
        } else {
            die("Please fill in all the fields.");
        }
    } else {
        die("Invalid request method.");
    }
} catch (PDOException $e) {
    // Display error message if something goes wrong
    echo "Connection failed: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>