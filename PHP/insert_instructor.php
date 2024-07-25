<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Instructor Management</title>
    <link rel="stylesheet" href="../CSS/Body/Instructor.css">
    <script src="../JS/Body/instructor.js" defer></script>
</head>

<body>
    <div class="container">
        <h1>Instructor Management</h1>

        <!-- Add Instructor Form -->
        <form id="addForm" method="POST" action="insert_instructor.php">
            <input type="text" name="name" placeholder="Instructor Name" required>
            <input type="text" name="nic" placeholder="NIC" required>
            <select name="gender" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit" name="add">Add Instructor</button>
        </form>

        <!-- Instructors Table -->
        <h2>Instructors</h2>
        <table id="instructorTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>NIC</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // db connection
                include 'db.php';

                // insert instructor
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
                    $name = $_POST['name'];
                    $nic = $_POST['nic'];
                    $gender = $_POST['gender'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];

                    $sql = "INSERT INTO instructors (name, nic, gender, phone, email) 
                            VALUES (:name, :nic, :gender, :phone, :email)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':nic', $nic);
                    $stmt->bindParam(':gender', $gender);
                    $stmt->bindParam(':phone', $phone);
                    $stmt->bindParam(':email', $email);

                    if ($stmt->execute()) {
                        echo "<script>alert('New instructor added successfully');</script>";
                    } else {
                        echo "<script>alert('Error adding instructor');</script>";
                    }
                }

                // updating instructor
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $nic = $_POST['nic'];
                    $gender = $_POST['gender'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];

                    $sql = "UPDATE instructors SET 
                                name = :name, 
                                nic = :nic, 
                                gender = :gender, 
                                phone = :phone, 
                                email = :email 
                            WHERE id = :id";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':id', $id);
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':nic', $nic);
                    $stmt->bindParam(':gender', $gender);
                    $stmt->bindParam(':phone', $phone);
                    $stmt->bindParam(':email', $email);

                    if ($stmt->execute()) {
                        echo "<script>alert('Instructor updated successfully');</script>";
                    } else {
                        echo "<script>alert('Error updating instructor');</script>";
                    }
                }

                // delete instructor
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
                    $id = $_POST['id'];

                    $sql = "DELETE FROM instructors WHERE id = :id";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':id', $id);

                    if ($stmt->execute()) {
                        echo "<script>alert('Instructor deleted successfully');</script>";
                    } else {
                        echo "<script>alert('Error deleting instructor');</script>";
                    }
                }

                // Fetch instructors 
                $sql = "SELECT * FROM instructors";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $instructors = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($instructors as $instructor) {
                    echo "<tr>";
                    echo "<td>" . $instructor['id'] . "</td>";
                    echo "<td>" . $instructor['name'] . "</td>";
                    echo "<td>" . $instructor['nic'] . "</td>";
                    echo "<td>" . $instructor['gender'] . "</td>";
                    echo "<td>" . $instructor['phone'] . "</td>";
                    echo "<td>" . $instructor['email'] . "</td>";
                    echo "<td>
                            <button onclick='fillUpdateForm(" . json_encode($instructor) . ")'>Update</button>
                          </td>";
                    echo "<td>
                            <form method='POST' action='index.php'>
                                <input type='hidden' name='id' value='" . $instructor['id'] . "'>
                                <button type='submit' name='delete'>Delete</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Update Instructor Form -->
    <div id="updateFormContainer" style="display: none;">
        <form id="updateForm" method="POST" action="index.php">
            <input type="hidden" name="id" required>
            <input type="text" name="name" placeholder="Instructor Name" required>
            <input type="text" name="nic" placeholder="NIC" required>
            <select name="gender" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit" name="update">Update Instructor</button>
            <button type="button" onclick="hideUpdateForm()">Cancel</button>
        </form>
    </div>
</body>

</html>