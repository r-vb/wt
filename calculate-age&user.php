<?php
/* calculate-age&user.php */
// Database configuration (replace with your actual database credentials)
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "dob-1";

// Create a connection to the database
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    // Fetch date of birth for the given ID from the database
    $id = $_GET['id'];
    $query = "SELECT date_of_birth FROM dob WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dobFromDB = $row['date_of_birth'];

        // User-entered date (assumed to be provided as a query parameter)
        $userEnteredDate = isset($_GET['user_date']) ? $_GET['user_date'] : ''; // http://example.com/calculate_age.php?id=1&user_date=2025-05-15


        // Calculate the age difference
        $diff = date_diff(new DateTime($dobFromDB), new DateTime($userEnteredDate));

        echo "<p>Date of Birth from Database: $dobFromDB</p>";
        echo "<p>User Entered Date: $userEnteredDate</p>";
        echo "<p>Age Difference: " . $diff->format('%y years, %m months, %d days') . "</p>";
    } else {
        echo "No user found with the given ID.";
    }
} else {
    echo "ID not provided in the URL.";
}

// Close the database connection
$conn->close();
?>
