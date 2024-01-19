<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form submission for updating the record
    $id = $_POST['id'];
    $newTitle = $conn->real_escape_string($_POST['newTitle']);
    $newAuthor = $conn->real_escape_string($_POST['newAuthor']);
    $newPrice = $conn->real_escape_string($_POST['newPrice']);    
    // $newDiscountedPrice = $conn->real_escape_string($_POST['newDiscountedPrice']);
    // Calculate new discounted price (10% off)
    $newDiscountedPrice = $newPrice - ($newPrice * 0.1);

    $updateSql = "UPDATE book SET title='$newTitle', author='$newAuthor', price='$newPrice', discounted_price='$newDiscountedPrice' WHERE id='$id'";
    
    if ($conn->query($updateSql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    // sleep(3);
    header("Location: table-added.php");
}

// Retrieve the book details for the given ID
if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $selectSql = "SELECT title, author, price, discounted_price FROM book WHERE id='$id'";
    $result = $conn->query($selectSql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $author = $row['author'];
        $price = $row['price'];
        $discountedPrice = $row['discounted_price'];
    } else {
        echo "Record not found";
        exit;
    }
} else {
    echo "Invalid request";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
</head>
<body>
    <h2>Update Book</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="newTitle">Title:</label>
        <input type="text" id="newTitle" name="newTitle" value="<?php echo $title; ?>"><br>
        <label for="newAuthor">Author:</label>
        <input type="text" id="newAuthor" name="newAuthor" value="<?php echo $author; ?>"><br>
        <label for="newPrice">Original Price:</label>
        <input type="text" id="newPrice" name="newPrice" value="<?php echo $price; ?>"><br>
        <label for="newDiscountedPrice">Discounted Price:</label>
        <input type="text" id="newDiscountedPrice" name="newDiscountedPrice" value="<?php echo $discountedPrice; ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
