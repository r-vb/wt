<script>
    setTimeout(function() {
        window.location.href = "table-added.php";
    }, 3000);
</script>

<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    
    $deleteSql = "DELETE FROM book WHERE id='$id'";
    
    if ($conn->query($deleteSql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request";
    exit;
}

$conn->close();
?>
