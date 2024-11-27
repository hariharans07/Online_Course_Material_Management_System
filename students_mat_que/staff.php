


<?php
 	include("dbconnect.php");
	extract($_POST);
	session_start();

if(isset($_POST['btn']))
{
$qry=mysqli_query($conn,"select * from staff where staff_id='$uname' && dob='$password'");
$num=mysqli_num_rows($qry);
if($num==1)
{
$qry1=mysqli_query($conn,"select * from staff where staff_id='$uname' && dob='$password'");
$row=mysqli_fetch_assoc($qry);
$_SESSION['sid']=$uname;
?>
<script>alert('welcome to User home page');
</script>
<?php

header("location:stahome.php");
}
else
{
echo "<script>alert('User Name Password Wrong.....')</script>";

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
        <div class="nav-content">
            <a href="#" class="logo">MATERIALS</a>
            <button class="menu-btn">
                <i class="fas fa-bars"></i>
            </button>
            <div class="nav-links">
                <button class="close-btn">
                    <i class="fas fa-times"></i>
                </button>
                <a href="index.php" class="nav-link ">
                 
                  ADMIN
                </a>
                <a href="student.php" class="nav-link">
                   STUDENT
                </a>
				 <a href="staff.php" class="nav-link active">
                   STAFF
                </a>
               
                
            </div>
        </div>
    </nav>

   
    <br /><br /><br /><br />
	
       <br /><br /><br /><br />
	
     <div class="login-container">
        <h1>Staff Login</h1>
        <form  method="POST">
            <div class="input-group">
                <label for="email">Staff ID</label>
                <input type="text" placeholder="Enter Register Number"  name="uname" required>
            </div>
            <div class="input-group">
                <label for="password">DOB</label>
                <input type="date" placeholder="Enter Password"  name="password" required>
            </div>
            <div class="input-group">
                <input type="submit" value="Log In" name="btn">
            </div>
           
        </form>
    </div>
 <br /><br /><br />


   
   
   
   <script src="script.js"></script>
</body>
</html>