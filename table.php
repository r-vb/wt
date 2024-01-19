<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Discounted Prices Table</title>
                <style>
                    table {
                        border-collapse: collapse;
                        width: 50%;
                        margin-top: 20px;
                    }

                    table, th, td {
                        border: 1px solid black;
                    }

                    th, td {
                        padding: 10px;
                        text-align: left;
                    }
                </style>
    </head>
    <body>

        <h2>DB Table Display</h2>

        <?php
            include('connection.php');

            // Retrieve discounted prices from the database
            $result = $conn->query("SELECT title, author, price, discounted_price, id FROM book");

            if ($result->num_rows > 0) {
                echo '<table>';
                echo '<tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Original Price</th>
                        <th>Discounted Price</th>
                      </tr>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['title'] . '</td>';
                    echo '<td>' . $row['author'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td>' . $row['discounted_price'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo 'No data available.';
            }

            // Close the database connection
            $conn->close();
            ?>

    </body>
</html>
