<script>
    setTimeout(function() {
        window.location.href = "../sumedha/index.php";
    }, 1000); // 1 second
</script>

<!-- insert.php -->

<?php
include('connection.php');

// Get form data
$title = $_POST['title'];
$author = $_POST['author'];
$price = $_POST['price'];
$id = $_POST['id'];

// Calculate discounted price (10% off)
$discountedPrice = $price - ($price * 0.1);

// Insert data into the database
$sql = "INSERT INTO book (title, author, price, id, discounted_price) VALUES ('$title', '$author', $price, '$id', $discountedPrice)";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted into the database successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

// Redirect to the table.php page
header("Location: table.php");
exit();
?>
