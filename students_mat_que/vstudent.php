<?php
include("dbconnect.php");
session_start();

if (isset($_POST['btn'])) {
    // Handle form submission if needed
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
        }
        table {
            width: 100%;
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        th {
            background-color: #3498db;
            color: #ffffff;
            font-weight: bold;
        }
        .btn-link {
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        .btn-update { color: #2ecc71; }
        .btn-delete { color: #e74c3c; }
    </style>
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
   

   
    <br /><br /><br /><br />
	
        <br /><br /><br /><br />

    <div style="padding: 20px; font-family: Arial, sans-serif;">
	
	
	
	
	
	
	
        <h3 style="text-align: center; color: #2c3e50; font-size: 24px; margin-bottom: 30px; text-transform: uppercase; letter-spacing: 2px;">Students Details</h3>

        <table>
            <tr>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Year</th>
                <th>Roll Number</th>
                <th>Study</th>
                <th>Actions</th>
            </tr>

            <?php
            $qry = mysqli_query($conn, "SELECT * FROM register");
            while ($row = mysqli_fetch_array($qry)) {
            ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['dob']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['dep']; ?></td>
                <td><?php echo $row['year']; ?></td>
                <td><?php echo $row['rollno']; ?></td>
                <td><?php echo $row['study']; ?></td>
                <td>
                    <a href="update.php?id=<?php echo $row['id']; ?>" class="btn-link btn-update">Update</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn-link btn-delete">Delete</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
