<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "slearn";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from the contact table
$sql = "SELECT ID, name, email, subject, message, submittedAt FROM contact";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Submissions</title>
    <style>
        .container {
            width: 80%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Contact Submissions</h1>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Submitted At</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["ID"] . "</td>
                        <td>" . htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8') . "</td>
                        <td>" . htmlspecialchars($row["email"], ENT_QUOTES, 'UTF-8') . "</td>
                        <td>" . htmlspecialchars($row["subject"], ENT_QUOTES, 'UTF-8') . "</td>
                        <td>" . htmlspecialchars($row["message"], ENT_QUOTES, 'UTF-8') . "</td>
                        <td>" . htmlspecialchars($row["submittedAt"], ENT_QUOTES, 'UTF-8') . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No results found.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>