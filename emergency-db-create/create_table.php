<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve table name from the form
    $table_name = $_POST["table_name"];

    // Validate and sanitize the table name to prevent SQL injection
    $table_name = preg_replace('/[^a-zA-Z0-9_]/', '', $table_name);

    // Connect to your database (replace these variables with your actual database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crt-tdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use string concatenation to create the table
    $sql = "CREATE TABLE $table_name (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table $table_name created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>