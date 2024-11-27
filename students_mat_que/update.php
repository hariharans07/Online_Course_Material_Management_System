<?php
include("dbconnect.php");
session_start();

// Get the student ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the student's current data from the database
    $qry = mysqli_query($conn, "SELECT * FROM register WHERE id='$id'");
    $student = mysqli_fetch_array($qry);
}

// Handle form submission to update the student's information
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dep = $_POST['dep'];
    $year = $_POST['year'];
    $rollno = $_POST['rollno'];
    $study = $_POST['study'];

    // Update the student's information in the database
    $updateQuery = "UPDATE register SET 
        name='$name', 
        dob='$dob', 
        email='$email', 
        phone='$phone', 
        dep='$dep', 
        year='$year', 
        rollno='$rollno', 
        study='$study' 
        WHERE id='$id'";

    if (mysqli_query($conn, $updateQuery)) {
        // Redirect to the student list page after successful update
        header("Location: vstudent.php");
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
    <title>Typography Navbar</title>
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
                <a href="addstaff.php" class="nav-link ">
                   ADD STAFF
                </a>
               
                <a href="allotesub.php" class="nav-link">
                 ALLOTE
                </a>
				
				<a href="vstudent.php" class="nav-link active">
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


    <h3>Update Student Information</h3>
    <form method="POST" action="" >
	
	
	
	
	
	
	<div class="login-container" >
	
	
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $student['name']; ?>" required><br><br>

        <label>Date of Birth:</label>
        <input type="date" name="dob" value="<?php echo $student['dob']; ?>" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $student['email']; ?>" required><br><br>

        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo $student['phone']; ?>" required><br><br>

        <label>Department:</label>
        <input type="text" name="dep" value="<?php echo $student['dep']; ?>" required><br><br>

        <label>Year:</label>
        <input type="text" name="year" value="<?php echo $student['year']; ?>" required><br><br>

        <label>Roll Number:</label>
        <input type="text" name="rollno" value="<?php echo $student['rollno']; ?>" required><br><br>

        <label>Study:</label>
        <input type="text" name="study" value="<?php echo $student['study']; ?>" required><br><br>

        <button type="submit" name="update">Update</button>

</div>
    </form>
</body>
</html>
