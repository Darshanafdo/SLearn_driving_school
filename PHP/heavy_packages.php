<?php
$conn = new mysqli('localhost', 'root', '', 'vehicle_packages');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM packages WHERE category='heavy'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Heavy Vehicle Packages</title>
    <link rel="stylesheet" href="../CSS/Body/packages.css">
    <link rel="stylesheet" href="../CSS/Main/footer.css">
    <link rel="stylesheet" href="../CSS/Main/header.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body>
    <h1>Heavy Vehicle Packages</h1>
    <div class="packages">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='package'>";
                echo "<h2>" . $row['package_name'] . "</h2>";
                echo "<p>Price: Rs." . $row['price'] . "</p>";
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"/>';
                echo "</div>";
            }
        } else {
            echo "No packages available.";
        }
        $conn->close();
        ?>
    </div>
</body>

</html>