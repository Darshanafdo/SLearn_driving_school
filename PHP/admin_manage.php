<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'slearn');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle deletion of a package
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM packages WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Handle update of a package
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $package_name = $_POST['package_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $vehicle_type = $_POST['vehicle_type'];

    // Check if a new image is uploaded
    if (!empty($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
        // Ensure the file is an image and get its contents
        $image = file_get_contents($_FILES['image']['tmp_name']);
        // Escape special characters for SQL
        $image = addslashes($image);

        // Update the package with the new image
        $stmt = $conn->prepare("UPDATE packages SET package_name = ?, description = ?, price = ?, image = ?, vehicle_type = ? WHERE id = ?");
        $stmt->bind_param("ssdssi", $package_name, $description, $price, $image, $vehicle_type, $id);
    } else {
        // Update the package without changing the image
        $stmt = $conn->prepare("UPDATE packages SET package_name = ?, description = ?, price = ?, vehicle_type = ? WHERE id = ?");
        $stmt->bind_param("ssdsi", $package_name, $description, $price, $vehicle_type, $id);
    }

    // Execute the statement
    if ($stmt->execute()) {
        echo "Package updated successfully!";
    } else {
        echo "Error updating package: " . $stmt->error;
    }

    $stmt->close();
}

// Retrieve all packages from the database
$sql = "SELECT * FROM packages";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Manage Packages</title>
    <link rel="stylesheet" href="../css/Body/package_manage.css">
</head>

<body>
    <h1>Manage Packages</h1>

    <div class="insert">
        <a href="../PHP/package_insert.php"><button type="button">Insert new package</button></a>
    </div>

    <div class="packages">
        <?php
        if ($result->num_rows > 0) {
            // Output each package
            while ($row = $result->fetch_assoc()) {
                echo "<form action='admin_manage.php' method='post' enctype='multipart/form-data'>";
                echo "<div class='package'>";
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "<label for='package_name'>Package Name:</label>";
                echo "<input type='text' name='package_name' value='" . htmlspecialchars($row['package_name'], ENT_QUOTES, 'UTF-8') . "' required><br>";

                echo "<label for='description'>Description:</label>";
                echo "<input type='text' name='description' value='" . htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8') . "' required><br>";

                echo "<label for='price'>Price:</label>";
                echo "<input type='text' name='price' value='" . htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8') . "' required><br>";

                echo "<label for='image'>Current Image:</label><br>";
                if (!empty($row['image'])) {
                    // Display the current image
                    echo "<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Package Image' style='width: 100px; height: auto;'><br>";
                } else {
                    echo "No image available<br>";
                }
                echo "<label for='image'>Upload New Image:</label>";
                echo "<input type='file' name='image'><br>";

                echo "<label for='vehicle_type'>Vehicle Type:</label>";
                echo "<select name='vehicle_type'>";
                echo "<option value='light'" . ($row['vehicle_type'] == 'light' ? ' selected' : '') . ">Light</option>";
                echo "<option value='heavy'" . ($row['vehicle_type'] == 'heavy' ? ' selected' : '') . ">Heavy</option>";
                echo "</select><br>";

                echo "<button type='submit' name='update'>Update</button>";
                echo "<button type='submit' name='delete'>Delete</button>";
                echo "</div>";
                echo "</form>";
            }
        } else {
            echo "No packages available.";
        }
        $conn->close();
        ?>
    </div>
</body>

</html>