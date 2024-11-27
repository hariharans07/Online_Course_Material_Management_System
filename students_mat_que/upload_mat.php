<?php
include("dbconnect.php");
session_start();

// Check if the user is logged in

    $sid = $_SESSION['sid'];
	
	
	$subid=$_GET['subid'];
	
	
$cyear=$_GET['cyear'];


if(isset($_POST['btn']))
{




$file_name=$_FILES['img']['name'];  
$file_loc=$_FILES['img']['tmp_name'];
$folder = "upload/";   

$path=move_uploaded_file($file_loc,$folder.$file_name);
$img=$file_name;



    
    // Insert feedback into the feedback table
    $sql = "update department_data set mat='$img' where staff_id='$sid' AND subject_code='$subid' AND cyear='$cyear' ";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>Feedback submitted successfully!</script>";
		
		
		
		
		
    } else {
        echo "<p align='center'>Error: " . mysqli_error($conn) . "</p>";
    }


       }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-content">
            <a href="#" class="logo" style="margin-right:50px">MATERIALS</a>
            <button class="menu-btn">
                <i class="fas fa-bars"></i>
            </button>
            <div class="nav-links">
                <button class="close-btn">
                    <i class="fas fa-times"></i>
                </button>
             <a href="stahome.php" class="nav-link">
                    <i class="fas fa-home"></i> Home
                </a>
               
                <a href="index.php" class="nav-link"> Logout
                </a>
            </div>
        </div>
    </nav>

    <br /><br /><br /><br />    <br /><br /><br /><br />
    <div class="login-container">
        <h1>Upload Material</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="input-group">
                
               <input type="file" name="img"/>
            </div>
            
            <div class="input-group">
                <input type="submit" value="Upload" name="btn">
            </div>
        </form>
    </div>
    <br /><br /><br /><br /> <br /><br /><br /><br />
    <script src="script.js"></script>
</body>
</html>
