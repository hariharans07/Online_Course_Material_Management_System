<?php
include("dbconnect.php");
session_start();

// Get the staff ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the staff's current data from the database
    $qry = mysqli_query($conn, "SELECT * FROM staff WHERE id='$id'");
    $staff = mysqli_fetch_array($qry);
}

// Handle form submission to update the staff's information
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $role = $_POST['role'];
    $joining_date = $_POST['joining_date'];
    $staff_id = $_POST['staff_id'];

    // Update the staff's information in the database
    $updateQuery = "UPDATE staff SET 
        name='$name', 
        dob='$dob', 
        email='$email', 
        phone='$phone', 
        department='$department', 
        role='$role', 
        joining_date='$joining_date', 
        staff_id='$staff_id' 
        WHERE id='$id'";

    if (mysqli_query($conn, $updateQuery)) {
        // Redirect to the staff list page after successful update
        header("Location: vstaff.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Staff Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>
<body>

<nav class="navbar">
    <div class="nav-content">
        <a style="margin-right:50px" href="#" class="logo">MATERIALS</a>
        <button class="menu-btn">
            <i class="fas fa-bars"></i>
        </button>
        <div class="nav-links">
            <a href="adminhome.php" class="nav-link ">
                  HOME 
                </a>
                <a href="addstaff.php" class="nav-link active">
                   ADD STAFF
                </a>
               
                <a href="allotesub.php" class="nav-link">
                 ALLOTE
                </a>
				
				<a href="vstudent.php" class="nav-link">
                   STUDENT
                </a>
				
				
				<a href="vstaff.php" class="nav-link">
                   STAFF
                </a>
				
				
				<a href="index.php" class="nav-link">
                    LOGOUT
                </a>
				
        </div>
    </div>
</nav>

<br><br><br><br><br>

<h3 style="text-align: center; color: #2c3e50; font-size: 24px; margin-bottom: 30px; text-transform: uppercase; letter-spacing: 2px;">Update Staff Information</h3>

<form method="POST" action="">
    <div class="login-container">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $staff['name']; ?>" required><br><br>

        <label>Date of Birth:</label>
        <input type="date" name="dob" value="<?php echo $staff['dob']; ?>" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $staff['email']; ?>" required><br><br>

        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo $staff['phone']; ?>" required><br><br>

        <label>Department:</label>
        <input type="text" name="department" value="<?php echo $staff['department']; ?>" required><br><br>

        <label>Role:</label>
        <input type="text" name="role" value="<?php echo $staff['role']; ?>" required><br><br>

        <label>Joining Date:</label>
        <input type="date" name="joining_date" value="<?php echo $staff['joining_date']; ?>" required><br><br>

        <label>Staff ID:</label>
        <input type="text" name="staff_id" value="<?php echo $staff['staff_id']; ?>" required><br><br>

        <button type="submit" name="update">Update</button>
    </div>
</form>
</body>
</html>
