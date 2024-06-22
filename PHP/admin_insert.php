<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $package_name = $_POST['package_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $vehicle_type = $_POST['vehicle_type'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $conn = new mysqli('localhost', 'root', '', 'slearn');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO packages (package_name,description, price, image, vehicle_type) VALUES ('$package_name','$description', '$price', '$image', '$vehicle_type')";

    if ($conn->query($sql) === TRUE) {
        echo "New package added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Package Insert</title>
    <link rel="stylesheet" href="../CSS/Body/admin_insert.css">
</head>

<body>

    <h1>Admin Package Insert</h1>
    <div class="insert">
        <!-- <button class="back button"> go back</button> -->
        <form action="admin_insert.php" method="post" enctype="multipart/form-data">

            <label for="package_name">Package Name:</label>
            <input type="text" id="package_name" name="package_name" required><br>

            <label for="description"> Description:</label>
            <input type="text" id="description" name="description" required><br>

            <label for="price">Price:</label>
            <input type="text" id="price" name="price" required><br>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" required><br>

            <label for="category">vehicle_type Category:</label>
            <select id="category" name="vehicle_type">
                <option value="light">select</option>
                <option value="light">Light</option>
                <option value="heavy">Heavy</option>
            </select><br>

            <button type="submit"> Add package</button>

        </form>
    </div>
</body>

</html>