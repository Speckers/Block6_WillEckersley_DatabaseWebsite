<html_entity_decode>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="index.css">
    </head>

<title>School Database</title>

<body> 
<div class="navbar">
            <a href="home.php">Home</a>
            <div class="dropdown">
                <button class="dropbtn">View
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="index.php">Student</a>
                    <a href="parents_guardians.php">Parent</a>
                    <a href="teachers.php">Teacher</a>
                    <a href="class.php">Class</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Add
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="AddStudent.php">Student</a>
                    <a href="AddParent.php">Parent</a>
                    <a href="AddTeacher.php">Teacher</a>
                </div>
            </div>
			<div class="dropdown">
              <button class="dropbtn">Delete
                  <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                  <a href="delstudent.php">Student</a>
                  <a href="DelParent.php">Parent</a>
                  <a href="DelTeacher.php">Teacher</a>
              </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn">Update
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="AddStudent.php">Student</a>
                <a href="AddParent.php">Parent</a>
                <a href="AddTeacher.php">Teacher</a>
            </div>
        </div>
            <a href="Contact.php">Contact Us</a>
        </div>

<?php



$link = mysqli_connect("localhost", "root", "", "school_db");
// Check connection
if ($link === false) {
    die("Connection failed: ");
}
?>

<h3>See all Students</h3>
	
		<table>
		
			<tr>
				<th width="150px">Pupil ID<br><hr></th>
				<th width="250px">Name<br><hr></th>
        <th width="250px">Address<br><hr></th>
        <th width="250px">Medical Information<br><hr></th>
			</tr>
				
			<?php
			/* 	function fetches a result row as an associative array.
              Note: Fieldnames returned from 
			  this function are case-sensitive.
			*/	
			$sql = mysqli_query($link, "SELECT Pupil_ID, Name, Address, Medical_Information FROM pupils");
			while ($row = $sql->fetch_assoc()){
			echo "
			<tr>
				<th>{$row['Pupil_ID']}</th>
				<th>{$row['Name']}</th>
        <th>{$row['Address']}</th>
        <th>{$row['Medical_Information']}</th>
			</tr>";
			}
			?>

      
            </table>
        </body>
        </html>


