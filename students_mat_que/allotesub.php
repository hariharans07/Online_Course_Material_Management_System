<?php
include("dbconnect.php");

// Insert data when the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $department = $_POST['department'];
    $staff = $_POST['staff'];
    $subjects = $_POST['subject'];
    $allocated_departments = $_POST['department1'];
    $years = $_POST['year'];
    $cyear = $_POST['cyear'];
    $batches = $_POST['batch'];
    $staff_id = $staff[0]; // Assuming you're selecting only one staff

    // Loop through dynamic fields and insert each set of values
    for ($i = 0; $i < count($subjects); $i++) {
        // Get subject code and name from the combined value
        $subject_parts = explode('|', $subjects[$i]);
        $subject_code = $subject_parts[0];
        $subject_name = $subject_parts[1];

        $allocated_department = $allocated_departments[$i];
        $year = $years[$i];
        $batch = $batches[$i];

        // Insert into the database
        $insertQuery = "INSERT INTO department_data (department, staff_id, subject_code, subject_name, allocated_department, year, batch, mat, que, cyear)
                       VALUES ('$department', '$staff_id', '$subject_code', '$subject_name', '$allocated_department', '$year', '$batch', '', '', '$cyear')";
        mysqli_query($conn, $insertQuery);
    }

    echo "Data successfully inserted!";
    exit;
}

if (isset($_GET['department'])) {
    $department = $_GET['department'];
    $response = ['staff' => [], 'subjects' => []];

    // Fetch staff for the selected department
    $staffQuery = "SELECT staff_id, name FROM staff WHERE department = '$department'";
    $staffResult = mysqli_query($conn, $staffQuery);
    while ($staff = mysqli_fetch_assoc($staffResult)) {
        $response['staff'][] = $staff;
    }

    // Fetch subjects for the selected department
    $subjectQuery = "SELECT subject_code, subject_name FROM subjects WHERE department = '$department'";
    $subjectResult = mysqli_query($conn, $subjectQuery);
    while ($subject = mysqli_fetch_assoc($subjectResult)) {
        $response['subjects'][] = $subject;
    }

    echo json_encode($response);
    exit;
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
    
    <script>
    let dynamicFieldCount = 1;

    function fetchDepartmentData() {
        const department = document.getElementById("department").value;

        if (department) {
            fetch(`?department=${department}`)
                .then(response => response.json())
                .then(data => {
                    // Populate staff dropdown for each dynamic field set
                    const staffSelects = document.querySelectorAll("select[name='staff[]']");
                    staffSelects.forEach(staffSelect => {
                        staffSelect.innerHTML = '<option value="">Select Staff</option>';
                        data.staff.forEach(staff => {
                            const option = document.createElement("option");
                            option.value = staff.staff_id;
                            option.textContent = staff.name;
                            staffSelect.appendChild(option);
                        });
                    });

                    // Populate subjects dropdown for each dynamic field set
                    const subjectSelects = document.querySelectorAll("select[name='subject[]']");
                    subjectSelects.forEach(subjectSelect => {
                        subjectSelect.innerHTML = '<option value="">Select Subject</option>';
                        data.subjects.forEach(subject => {
                            // Combine subject_code and subject_name with a separator
                            const option = document.createElement("option");
                            option.value = `${subject.subject_code}|${subject.subject_name}`;
                            option.textContent = `${subject.subject_code} - ${subject.subject_name}`;
                            subjectSelect.appendChild(option);
                        });
                    });
                })
                .catch(error => console.error("Error fetching data:", error));
        }
    }

    function addDynamicFields() {
        const container = document.getElementById("dynamicFieldsContainer");

        const fieldWrapper = document.createElement("div");
        fieldWrapper.className = "dynamic-field-set";
        fieldWrapper.innerHTML = `
            <div style="background-color: white; padding: 20px; border-radius: 6px; margin-bottom: 20px; border: 1px solid #eee;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label for="subject" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Subject:</label>
                        <select name="subject[]" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background-color: white; font-size: 14px;">
                            <option value="">Select Subject</option>
                        </select>
                    </div>

                    <div>
                        <label for="department1" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Allocate Department:</label>
                        <select name="department1[]" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background-color: white; font-size: 14px;">
                            <option value="">Select Department</option>
                            <option value="BE MECH">BE MECH</option>
                            <option value="BE CIVIL">BE CIVIL</option>
                            <option value="CSE">CSE</option>
                            <option value="EEE">EEE</option>
                            <option value="ECE">ECE</option>
                        </select>
                    </div>

                    <div>
                        <label for="year" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Year:</label>
                        <select name="year[]" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background-color: white; font-size: 14px;">
                            <option value="I YEAR A">I YEAR A</option>
                            <option value="I YEAR B">I YEAR B</option>
                            <option value="II YEAR A">II YEAR A</option>
                            <option value="II YEAR B">II YEAR B</option>
                            <option value="III YEAR A">III YEAR A</option>
                            <option value="III YEAR B">III YEAR B</option>
                            <option value="IV YEAR A">IV YEAR A</option>
                            <option value="IV YEAR B">IV YEAR B</option>
                        </select>
                    </div>

                    <div>
                        <label for="batch" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Batch:</label>
                        <input type="text" name="batch[]" placeholder="Enter Batch (e.g., 2022-2026)" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background-color: white; font-size: 14px;">
                    </div>
                </div>
                
                <div style="margin-top: 20px; text-align: right;">
                    <button type="button" class="remove-field-btn" onclick="removeDynamicField(this)" style="padding: 8px 16px; background-color: #ff4444; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">Remove</button>
                </div>
                
                <hr style="margin: 20px 0; border: none; border-top: 1px solid #eee;" />
            </div>
        `;
        
        container.appendChild(fieldWrapper);
        dynamicFieldCount++;
        fetchDepartmentData();
    }

    function removeDynamicField(button) {
        const fieldSet = button.closest('.dynamic-field-set');
        if (fieldSet) {
            fieldSet.remove();
            dynamicFieldCount--;
        }
    }
    </script>
</head>
<body>
    <nav class="navbar">
        <div class="nav-content">
            <a style="margin-right:50px" href="#" class="logo">MATERIALS</a>
            <button class="menu-btn">
                <i class="fas fa-bars"></i>
            </button>
            <div class="nav-links">
                <button class="close-btn">
                    <i class="fas fa-times"></i>
                </button>
                <a href="adminhome.php" class="nav-link">
                    HOME
                </a>
                <a href="addstaff.php" class="nav-link">
                    ADD STAFF
                </a>
                <a href="allotesub.php" class="nav-link active">
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

    <form method="POST" action="" style="max-width: 800px; margin: 20px auto; padding: 30px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <label for="year" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Select Year:</label>
        <select name="cyear" id="cyear" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background-color: white; font-size: 14px;">
            <option value="">Select Year</option>
            <?php
                $startYear = 2021;
                $endYear = 2050;
                for ($year = $startYear; $year <= $endYear; $year++) {
                    $nextYear = $year + 1;
                    echo "<option value='{$year}-{$nextYear}'>{$year}-{$nextYear}</option>";
                }
            ?>
        </select>

        <div style="margin-bottom: 25px;">
            <label for="department" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Department:</label>
            <select name="department" id="department" onChange="fetchDepartmentData()" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background-color: white; font-size: 14px;">
                <option value="">Select Department</option>
                <option value="BE MECH">BE MECH</option>
                <option value="BE CIVIL">BE CIVIL</option>
                <option value="CSE">CSE</option>
                <option value="EEE">EEE</option>
                <option value="ECE">ECE</option>
            </select>
        </div>

        <div style="margin-bottom: 25px;">
            <label for="staff" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Staff:</label>
            <select name="staff[]" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background-color: white; font-size: 14px;">
                <option value="">Select Staff</option>
            </select>
        </div>

        <div id="dynamicFieldsContainer">
            <div class="dynamic-field-set" style="background-color: white; padding: 20px; border-radius: 6px; margin-bottom: 20px; border: 1px solid #eee;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label for="subject" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Subject:</label>
                        <select name="subject[]" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background-color: white; font-size: 14px;">
                            <option value="">Select Subject</option>
                        </select>
                    </div>

                    <div>
                        <label for="department1" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Allocate Department:</label>
                        <select name="department1[]" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background-color: white; font-size: 14px;">
                            <option value="">Select Department</option>
                            <option value="BE MECH">BE MECH</option>
                            <option value="BE CIVIL">BE CIVIL</option>
                            <option value="CSE">CSE</option>
                            <option value="EEE">EEE</option>
                            <option value="ECE">ECE</option>
                        </select>
                    </div>

                <div>
                    <label for="year" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Year:</label>
                    <select name="year[]" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background-color: white; font-size: 14px;">
                        <option value="I YEAR A">I YEAR A</option>
                        <option value="I YEAR B">I YEAR B</option>
                        <option value="II YEAR A">II YEAR A</option>
                        <option value="II YEAR B">II YEAR B</option>
                        <option value="III YEAR A">III YEAR A</option>
                        <option value="III YEAR B">III YEAR B</option>
                        <option value="IV YEAR A">IV YEAR A</option>
                        <option value="IV YEAR B">IV YEAR B</option>
                    </select>
                </div>

                <div>
                    <label for="batch" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Batch:</label>
                    <input type="text" name="batch[]" placeholder="Enter Batch (e.g., 2022-2026)" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background-color: white; font-size: 14px;">
                </div>
            </div>
            
            <div style="margin-top: 20px; text-align: right;">
                <button type="button" class="remove-field-btn" onClick="removeDynamicField(this)" style="padding: 8px 16px; background-color: #ff4444; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">Remove</button>
            </div>
            
            <hr style="margin: 20px 0; border: none; border-top: 1px solid #eee;" />
        </div>
    </div>

    <div style="margin-top: 20px; text-align: center;">
        <button type="button" onClick="addDynamicFields()" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; margin-right: 10px; font-size: 14px;">Add More Fields</button>
        
        <button type="submit" style="padding: 10px 20px; background-color: #2196F3; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">Submit</button>
    </div>
</form>
	
	 <script src="script.js"></script>
</body>
</html>
