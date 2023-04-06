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

<h3>Add Teachers</h3>
	<form action="AddTeacher.php" method="post" >
<input type="text"name="Name" placeholder= "Name">
<input type="text"name="Address" placeholder= "Address">
<input type="text"name="Phone" placeholder= "Phone">
<input type="text"name="Annual_Salary" placeholder= "Annual Salary">
<input type="text"name="Background_Check" placeholder= "Background Check">
<input type="text"name="Teacher_Medical" placeholder= "Medical">
<input type="submit"name="submission">


  </form>
		<table>
		
			<tr>
				<th width="150px">Teacher ID<br><hr></th>
				<th width="250px">Name<br><hr></th>
                <th width="250px">Address<br><hr></th>
                <th width="250px">Phone<br><hr></th>
                <th width="250px">Annual Salary<br><hr></th>
                <th width="250px">Background Check<br><hr></th>
                <th width="250px">Teacher Medical<br><hr></th>
			</tr>
				
			<?php
			/* 	function fetches a result row as an associative array.
              Note: Fieldnames returned from 
			  this function are case-sensitive.
			*/	
			$sql = mysqli_query($link, "SELECT Teacher_ID, Name, Address, Phone, Annual_Salary, Background_Check, Teacher_Medical FROM teachers");
			while ($row = $sql->fetch_assoc()){
			echo "
			<tr>
				<th>{$row['Teacher_ID']}</th>
				<th>{$row['Name']}</th>
                <th>{$row['Address']}</th>
                <th>{$row['Phone']}</th>
                <th>{$row['Annual_Salary']}</th>
                <th>{$row['Background_Check']}</th>
                <th>{$row['Teacher_Medical']}</th>
			</tr>";
			}
		
      if(isset($_POST['submission'])){
          $Name = $_POST['Name'];
          $Address = $_POST['Address'];
          $Teacher_Medical = $_POST['Teacher_Medical'];
          $Phone = $_POST['Phone'];
          $Annual_Salary = $_POST['Annual_Salary'];
          $Background_Check = $_POST['Background_Check'];
          $sql = "INSERT INTO `teachers` (`Name`, `Address`, `Phone`, `Teacher_Medical`, `Annual_Salary`, `Background_Check`) VALUES ('$Name', '$Address', '$Phone', '$Teacher_Medical', '$Annual_Salary', '$Background_Check')";
          
          
          $result = mysqli_query($link, $sql);

          if (!$result){
            echo "Error";
            echo $sql;
          }else{
              echo "<h1>Teacher added successfully</h1>";
          }
      }
			?>

      
            </table>
        </body>
        </php>


