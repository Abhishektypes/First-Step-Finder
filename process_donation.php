<?php
// Start session to access the logged-in user's data
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Update with your database username
$password = ""; // Update with your database password
$dbname = "login_system"; // Update with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the input
    $donationAmount = filter_var($_POST['amount'], FILTER_VALIDATE_FLOAT);

    // Fetch the logged-in user's email from the session
    if (isset($_SESSION['email'])) {
        $userEmail = $_SESSION['email'];

        // Check if the email exists in the users table (optional step for security)
        $stmtUser = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $stmtUser->bind_param("s", $userEmail);
        $stmtUser->execute();
        $resultUser = $stmtUser->get_result();
        
        if ($resultUser->num_rows > 0) {
            // If the user is found, proceed to record the donation
            $stmtUser->close();
        } else {
            echo "<script>alert('User not found. Please log in again.'); window.location.href='login.php';</script>";
            exit();
        }
    } else {
        // Handle case where user is not logged in
        echo "<script>alert('Please log in to make a donation.'); window.location.href='login.php';</script>";
        exit();
    }

    if ($donationAmount && $donationAmount > 0) {
        // Prepare and bind SQL statement to insert donation along with the user's email
        $stmt = $conn->prepare("INSERT INTO donations (email, amount, donation_date) VALUES (?, ?, NOW())");
        $stmt->bind_param("sd", $userEmail, $donationAmount); // "s" for string (email), "d" for double (amount)

        // Execute the statement
        if ($stmt->execute()) {
            // Use JavaScript to show alert and then redirect back to the donation page
            echo "<script>
                    alert('Thank you for your generous donation of rs" . number_format($donationAmount, 2) . "!');
                    window.location.href='index.php';
                  </script>";
        } else {
            echo "<p>Error: Could not process the donation. Please try again.</p>";
            echo "<a href='donation_page_link.html'>Go back to the donation page</a>";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "<p>Invalid donation amount. Please enter a valid number.</p>";
        echo "<a href='donation_page_link.html'>Go back</a>";
    }
}

// Close connection
$conn->close();
?>
