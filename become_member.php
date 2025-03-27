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
        if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['interests'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone']; // Correct assignment
            $interests = $_POST['interests']; // Correct assignment

            // Begin a transaction to ensure both queries succeed or both fail
            $conn->beginTransaction();

            // Prepare the SQL query to insert into member table
            $sql_users = "INSERT INTO member (name, email, phone, interests) VALUES (:name, :email, :phone, :interests)";
            $stmt_users = $conn->prepare($sql_users);

            // Bind all placeholders
            $stmt_users->bindParam(':name', $name);
            $stmt_users->bindParam(':email', $email);
            $stmt_users->bindParam(':phone', $phone);
            $stmt_users->bindParam(':interests', $interests);

            // Execute the query
            if ($stmt_users->execute()) {
                // Commit the transaction if the query succeeds
                $conn->commit();
                
                // Redirect to index.html with a success message
                echo "<script>
                        alert('Data sent successfully!');
                        window.location.href = 'index.html';
                      </script>";
            } else {
                // Rollback the transaction if the query fails
                $conn->rollBack();
                echo "Error: Unable to execute the query.";
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
