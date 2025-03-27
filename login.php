<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form input
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Server-side validation
    if (empty($email)) {
        echo "Email is required.";
        exit;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    } elseif (empty($password)) {
        echo "Password is required.";
        exit;
    }

    // Connect to the database
    $dsn = "mysql:host=localhost;dbname=login_system";
    $username = "root";
    $db_password = "";

    try {
        $pdo = new PDO($dsn, $username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Query to check if the user exists
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password); // Note: Password should be hashed in real applications

        $stmt->execute();

        // If user exists
        if ($stmt->rowCount() > 0) {
            // Store the user's email in the session
            $_SESSION['email'] = $email;

            // Redirect to index.html with a success message
            header("Location: index.php");
            exit();
        } else {
            // If credentials are incorrect
            echo "Invalid email or password.";
        }

    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
