
<?php
 	include("dbconnect.php");
	extract($_POST);
	session_start();

if(isset($_POST['btn']))
{
$qry1=mysqli_query($conn,"select * from register where rollno='$rollno'");
$count=mysqli_num_rows($qry1);
if($count>0){                                                                                           
echo "<script>alert('Roll Number already taken')</script>";
}else{
$qry=mysqli_query($conn,"insert into register values('','$name','$dob','$email','$phone','$dep','$year','$rollno','$years')");
	if($qry)
	{
	
	echo "<script>alert('Registered sucessfully')</script>";
	
	}	
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
                <a href="adminhome.php" class="nav-link active">
                  HOME 
                </a>
                <a href="addstaff.php" class="nav-link ">
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

   
    <br /><br /><br /><br />
	
        <br /><br /><br /><br />
	
    <div class="login-container" style="width:500px">
        <h1>Add Student</h1>
        <form  method="POST">
            <div class="input-group">
                <label for="email">Name</label>
                <input type="text" placeholder="Enter Your Name"  name="name" required>
            </div>
			
			
			
			 <div class="input-group">
                <label for="email">DOB</label>
                <input type="date" placeholder="Enter Your Age"  name="dob" required>
            </div>
			
			
			 <div class="input-group">
                <label for="email">Email Id</label>
                <input type="email" placeholder="Enter Your Email"  name="email" required>
            </div>
			
			
			
			<div class="input-group">
                <label for="email">Phone Number</label>
                <input type="text" placeholder="Enter Your Number"  name="phone" required>
            </div>
			
			
		
			<div class="input-group">
                <label for="email">Department</label>
               
				 <select name="dep" required>
 <option value="BE MECH">BE MECH</option>
	<option value="BE CIVIL">BE CIVIL</option>
	<option value="CSE">CSE</option>
	<option value="EEE">EEE</option>

<option value="ECE">ECE</option>

	
	</select>
            </div>
			
			
			
			
			
			
			
			<div class="input-group">
                <label for="email">Year</label>
               
				 <select name="years" required>
 
	<option value="I YEAR A">I YEAR A</option>
	<option value="I YEAR">I YEAR B</option>
	<option value="II YEAR A">II YEAR A</option>
		<option value="II YEAR">II YEAR B</option>
	<option value="III YEAR A">III YEAR A</option>
		<option value="III YEAR">III YEAR B</option>
	<option value="IV YEAR A">IV YEAR A</option>
	<option value="IV YEAR">IV YEAR B</option>
	

	
	</select>
            </div>
			
			
			
			
			
			
			
			
			<div class="input-group">
                <label for="email">Batch</label>
                <input type="text" placeholder="2022-2026"  name="year" required>
            </div>
		
			
			<div class="input-group">
                <label for="email">Roll Number</label>
                <input type="text" placeholder="Enter Your Usename"  name="rollno" required>
            </div>
			
				
			
			
			
            <div class="input-group">
                <input type="submit" value="Submit" name="btn" style="padding:20px">
				
            </div>
          
        </form>
    </div>
 <br /><br /><br />
 <br /><br /><br />


   
   
   
   <script src="script.js"></script>
</body>
</html>