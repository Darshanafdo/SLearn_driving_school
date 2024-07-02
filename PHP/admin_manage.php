<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: ./admin_manage.php");
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'slearn');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM packages WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $package_name = $_POST['package_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    if (!empty($_FILES['image']['tmp_name'])) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $stmt = $conn->prepare("UPDATE packages SET package_name = ?, price = ?, image = ?, category = ? WHERE id = ?");
        $stmt->bind_param("sssii", $package_name, $price, $image, $category, $id);
    } else {
        $stmt = $conn->prepare("UPDATE packages SET package_name = ?, price = ?, category = ? WHERE id = ?");
        $stmt->bind_param("sssi", $package_name, $price, $category, $id);
    }

    $stmt->execute();
    $stmt->close();
}

$sql = "SELECT * FROM packages";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Manage Packages</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Manage Packages</h1>
    <div class="packages">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<form action='admin_manage.php' method='post' enctype='multipart/form-data'>";
                echo "<div class='package'>";
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "<label for='package_name'>Package Name:</label>";
                echo "<input type='text' name='package_name' value='" . $row['package_name'] . "' required><br>";
                echo "<label for='price'>Price:</label>";
                echo "<input type='text' name='price' value='" . $row['price'] . "' required><br>";
                echo "<label for='image'>Image:</label>";
                echo "<input type='file' name='image'><br>";
                echo "<label for='category'>Category:</label>";
                echo "<select name='category'>";
                echo "<option value='light'" . ($row['category'] == 'light' ? ' selected' : '') . ">Light</option>";
                echo "<option value='heavy'" . ($row['category'] == 'heavy' ? ' selected' : '') . ">Heavy</option>";
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

</html><?php
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header("Location: admin_login.php");
            exit();
        }

        $conn = new mysqli('localhost', 'root', '', 'vehicle_packages');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $stmt = $conn->prepare("DELETE FROM packages WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $package_name = $_POST['package_name'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            if (!empty($_FILES['image']['tmp_name'])) {
                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $stmt = $conn->prepare("UPDATE packages SET package_name = ?, price = ?, image = ?, category = ? WHERE id = ?");
                $stmt->bind_param("sssii", $package_name, $price, $image, $category, $id);
            } else {
                $stmt = $conn->prepare("UPDATE packages SET package_name = ?, price = ?, category = ? WHERE id = ?");
                $stmt->bind_param("sssi", $package_name, $price, $category, $id);
            }

            $stmt->execute();
            $stmt->close();
        }

        $sql = "SELECT * FROM packages";
        $result = $conn->query($sql);
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Manage Packages</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Manage Packages</h1>
    <div class="packages">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<form action='admin_manage.php' method='post' enctype='multipart/form-data'>";
                echo "<div class='package'>";
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "<label for='package_name'>Package Name:</label>";
                echo "<input type='text' name='package_name' value='" . $row['package_name'] . "' required><br>";
                echo "<label for='price'>Price:</label>";
                echo "<input type='text' name='price' value='" . $row['price'] . "' required><br>";
                echo "<label for='image'>Image:</label>";
                echo "<input type='file' name='image'><br>";
                echo "<label for='category'>Category:</label>";
                echo "<select name='category'>";
                echo "<option value='light'" . ($row['category'] == 'light' ? ' selected' : '') . ">Light</option>";
                echo "<option value='heavy'" . ($row['category'] == 'heavy' ? ' selected' : '') . ">Heavy</option>";
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

</html><?php

        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header("Location: admin_login.php");
            exit();
        }

        $conn = new mysqli('localhost', 'root', '', 'vehicle_packages');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $stmt = $conn->prepare("DELETE FROM packages WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $package_name = $_POST['package_name'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            if (!empty($_FILES['image']['tmp_name'])) {
                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $stmt = $conn->prepare("UPDATE packages SET package_name = ?, price = ?, image = ?, category = ? WHERE id = ?");
                $stmt->bind_param("sssii", $package_name, $price, $image, $category, $id);
            } else {
                $stmt = $conn->prepare("UPDATE packages SET package_name = ?, price = ?, category = ? WHERE id = ?");
                $stmt->bind_param("sssi", $package_name, $price, $category, $id);
            }

            $stmt->execute();
            $stmt->close();
        }

        $sql = "SELECT * FROM packages";
        $result = $conn->query($sql);
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Manage Packages</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Manage Packages</h1>
    <div class="packages">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<form action='admin_manage.php' method='post' enctype='multipart/form-data'>";
                echo "<div class='package'>";
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "<label for='package_name'>Package Name:</label>";
                echo "<input type='text' name='package_name' value='" . $row['package_name'] . "' required><br>";
                echo "<label for='price'>Price:</label>";
                echo "<input type='text' name='price' value='" . $row['price'] . "' required><br>";
                echo "<label for='image'>Image:</label>";
                echo "<input type='file' name='image'><br>";
                echo "<label for='category'>Category:</label>";
                echo "<select name='category'>";
                echo "<option value='light'" . ($row['category'] == 'light' ? ' selected' : '') . ">Light</option>";
                echo "<option value='heavy'" . ($row['category'] == 'heavy' ? ' selected' : '') . ">Heavy</option>";
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

</html><?php
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header("Location: admin_login.php");
            exit();
        }

        $conn = new mysqli('localhost', 'root', '', 'vehicle_packages');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $stmt = $conn->prepare("DELETE FROM packages WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $package_name = $_POST['package_name'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            if (!empty($_FILES['image']['tmp_name'])) {
                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $stmt = $conn->prepare("UPDATE packages SET package_name = ?, price = ?, image = ?, category = ? WHERE id = ?");
                $stmt->bind_param("sssii", $package_name, $price, $image, $category, $id);
            } else {
                $stmt = $conn->prepare("UPDATE packages SET package_name = ?, price = ?, category = ? WHERE id = ?");
                $stmt->bind_param("sssi", $package_name, $price, $category, $id);
            }

            $stmt->execute();
            $stmt->close();
        }

        $sql = "SELECT * FROM packages";
        $result = $conn->query($sql);
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Manage Packages</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Manage Packages</h1>
    <div class="packages">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<form action='admin_manage.php' method='post' enctype='multipart/form-data'>";
                echo "<div class='package'>";
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "<label for='package_name'>Package Name:</label>";
                echo "<input type='text' name='package_name' value='" . $row['package_name'] . "' required><br>";
                echo "<label for='price'>Price:</label>";
                echo "<input type='text' name='price' value='" . $row['price'] . "' required><br>";
                echo "<label for='image'>Image:</label>";
                echo "<input type='file' name='image'><br>";
                echo "<label for='category'>Category:</label>";
                echo "<select name='category'>";
                echo "<option value='light'" . ($row['category'] == 'light' ? ' selected' : '') . ">Light</option>";
                echo "<option value='heavy'" . ($row['category'] == 'heavy' ? ' selected' : '') . ">Heavy</option>";
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