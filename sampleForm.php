<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Form</title>
    <!-- Add jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle focus event
            $("#title, #author, #price, #id").focus(function() {
                $(this).css("background-color", "lightblue"); // Change to your desired color
            });

            // Handle blur event
            $("#title, #author, #price, #id").blur(function() {
                $(this).css("background-color", "#ffffff"); // Reset to default or another color
            });
        });
    </script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        input[type="reset"],
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="reset"]:hover,
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <form id="bookForm" action="insert.php" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required><br>

        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required><br>

        <input type="reset" value="Reset" onclick="resetForm()">
        <input type="submit" value="Submit">
    </form>
    <center><input type="submit" value="Show Table" onclick="showTable()" style="max-width: 700px;"></center>

    <script>
        function resetForm() {
            alert('You have resetted the form. Please fill all fields.');
        }
        function showTable() {
            window.location.href = "table.php";
        }
    </script>

</body>
</html>
