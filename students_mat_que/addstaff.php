<?php
include("dbconnect.php");
session_start();

if (isset($_POST['registerStaff'])) {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $role = $_POST['role'];
    $joining_date = $_POST['joining_date'];
    $staff_id = $_POST['staff_id'];

    // Check if Staff ID is already taken
    $qry1 = mysqli_query($conn, "SELECT * FROM staff WHERE staff_id='$staff_id'");
    $count = mysqli_num_rows($qry1);

    if ($count > 0) {
        echo "<script>alert('Staff ID already taken')</script>";
    } else {
        // Insert staff information into the database
        $qry = mysqli_query($conn, "INSERT INTO staff VALUES('', '$name', '$dob', '$email', '$phone', '$department', '$role', '$joining_date', '$staff_id')");
        
        if ($qry) {
            echo "<script>alert('Staff Registered Successfully')</script>";
        } else {
            echo "<script>alert('Error registering staff')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>
<body>
   <nav class="navbar">
        <div class="nav-content" >
            <a style="margin-right:50px" href="#" class="logo">MATERIALS</a>
            <button class="menu-btn">
                <i class="fas fa-bars"></i>
            </button>
            <div class="nav-links">
                <button class="close-btn">
                    <i class="fas fa-times"></i>
                </button>
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

    <br><br><br><br>   <br><br><br><br>
    <div class="login-container" style="width:500px">
        <h1>Register Staff</h1>
        <form method="POST">
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" placeholder="Enter Staff Name" name="name" required>
            </div>

            <div class="input-group">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" required>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" placeholder="Enter Staff Email" name="email" required>
            </div>

            <div class="input-group">
                <label for="phone">Phone Number</label>
                <input type="text" placeholder="Enter Staff Phone Number" name="phone" required>
            </div>

            <div class="input-group">
                <label for="department">Department</label>
                <select name="department" required>
                   <option value="BE MECH">BE MECH</option>
	<option value="BE CIVIL">BE CIVIL</option>
	<option value="CSE">CSE</option>
	<option value="EEE">EEE</option>

<option value="ECE">ECE</option>

                </select>
            </div>

            <div class="input-group">
                <label for="role">Role</label>
                <input type="text" placeholder="Enter Staff Role" name="role" required>
            </div>

            <div class="input-group">
                <label for="joining_date">Joining Date</label>
                <input type="date" name="joining_date" required>
            </div>

            <div class="input-group">
                <label for="staff_id">Staff ID</label>
                <input type="text" placeholder="Enter Staff ID" name="staff_id" required>
            </div>

            <div class="input-group">
                <input type="submit" value="Register Staff" name="registerStaff" style="padding:20px">
            </div>
        </form>
    </div>

    <br><br><br>
    <script src="script.js"></script>
</body>
</html>
