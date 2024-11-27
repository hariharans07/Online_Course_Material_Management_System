<?php
include("dbconnect.php");
session_start();

echo $stuid=$_SESSION['rollno'];// Assuming the session holds the staff_id
$qry1=mysqli_query($conn,"select * from register where rollno='$stuid'");
$row=mysqli_fetch_assoc($qry1);
   
   echo  $dep=$row['dep'];
	 echo $year=$row['year'];
	echo   $study=$row['study'];
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
// Fetch records when the form is submitted or year is selected
$cyear = isset($_POST['cyear']) ? $_POST['cyear'] : '';

if ($cyear) {
    // Query to fetch records based on cyear and staff_id
    $query = "SELECT * FROM department_data WHERE cyear = ? AND allocated_department = ? AND year = ?  AND batch = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $cyear,$dep,$study,$year); // Bind the variables
    $stmt->execute();
    $result = $stmt->get_result();
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
                <a href="uhome.php" class="nav-link active">
                    <i class="fas fa-home"></i> HOME
                </a>
               
                <a href="index.php" class="nav-link"> LOGOUT
                </a>
            </div>
        </div>
    </nav>

    <br /><br /><br /><br /> <br /><br /><br /><br />
    <div class="login-container">
        <form method="POST">
            <label for="cyear" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Select Year:</label>
            <select name="cyear" id="cyear" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background-color: white; font-size: 14px;" onChange="this.form.submit()">
                <option value="">Select Year</option>
                <?php
                    $startYear = 2021;
                    $endYear = 2050;
                    for ($year = $startYear; $year <= $endYear; $year++) {
                        $nextYear = $year + 1;
                        echo "<option value='{$year}-{$nextYear}'" . ($cyear == "{$year}-{$nextYear}" ? " selected" : "") . ">{$year}-{$nextYear}</option>";
                    }
                ?>
            </select>
        </form>
    </div>

    <br /><br /><br /><br /> <br /><br /><br /><br />

    <!-- Display records based on selected year -->
    <?php if ($cyear && $result->num_rows > 0): ?>
       <div style="width: 100%; overflow-x: auto; margin: 20px 0; padding: 20px;">
    <table style="width: 100%; border-collapse: collapse; background-color: white; box-shadow: 0 1px 3px rgba(0,0,0,0.2); border-radius: 8px; overflow: hidden;">
        <thead>
            <tr style="background-color: #f8f9fa;">
                <th style="padding: 15px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #dee2e6;">ID</th>
                <th style="padding: 15px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #dee2e6;">Department</th>
                <th style="padding: 15px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #dee2e6;">Staff ID</th>
                <th style="padding: 15px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #dee2e6;">Subject Code</th>
                <th style="padding: 15px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #dee2e6;">Subject Name</th>
                <th style="padding: 15px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #dee2e6;">Allocated Department</th>
                <th style="padding: 15px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #dee2e6;">Year</th>
                <th style="padding: 15px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #dee2e6;">Batch</th>
                <th style="padding: 15px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #dee2e6;">Mat</th>
                <th style="padding: 15px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #dee2e6;">Que</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr style="border-bottom: 1px solid #dee2e6; transition: background-color 0.3s ease;">
                    <td style="padding: 12px 15px; color: #555;"><?php echo $row['id']; ?></td>
                    <td style="padding: 12px 15px; color: #555;"><?php echo $row['department']; ?></td>
                    <td style="padding: 12px 15px; color: #555;"><?php echo $row['staff_id']; ?></td>
                    <td style="padding: 12px 15px; color: #555;"><?php echo $row['subject_code']; ?></td>
                    <td style="padding: 12px 15px; color: #555;"><?php echo $row['subject_name']; ?></td>
                    <td style="padding: 12px 15px; color: #555;"><?php echo $row['allocated_department']; ?></td>
                    <td style="padding: 12px 15px; color: #555;"><?php echo $row['cyear']; ?></td>
                    <td style="padding: 12px 15px; color: #555;"><?php echo $row['batch']; ?></td>
                    <td style="padding: 12px 15px;">
                        <?php if (empty($row['mat'])): ?>
                            <a href="upload_mat.php?subid=<?php echo $row['subject_code']; ?>&cyear=<?php echo $cyear; ?>" style="display: inline-block; padding: 6px 12px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; font-size: 14px; transition: background-color 0.3s ease;">Not Upload Yet</a>
                        <?php else: ?>
						
						
						
						  <a href="upload/<?php echo $row['mat']; ?>"  style="display: inline-block; padding: 6px 12px; background-color: #28a745; color: white; border-radius: 4px; font-size: 14px;" download >Download</a>
						
						
						
                           
                        <?php endif; ?>
                    </td>
                    <td style="padding: 12px 15px;">
                        <?php if (empty($row['que'])): ?>
                            <a href="upload_que.php?subid=<?php echo $row['subject_code']; ?>&cyear=<?php echo $cyear; ?>" style="display: inline-block; padding: 6px 12px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; font-size: 14px; transition: background-color 0.3s ease;">Not Upload Yet</a>
                        <?php else: ?>
                          <a href="upload/<?php echo $row['que']; ?>"  style="display: inline-block; padding: 6px 12px; background-color: #28a745; color: white; border-radius: 4px; font-size: 14px;" download >Download</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
    <?php elseif ($cyear): ?>
        <p>No records found for the selected year.</p>
    <?php endif; ?>

    <script src="script.js"></script>
</body>
</html>
