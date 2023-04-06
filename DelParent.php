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

<h3>Delete Parent</h3>
	<form action="DelParent.php" method="post" >
<input type="text"name="ID"placeholder = "ID">
<input type="submit"name="submission">


  </form>
		<table>
		
			<tr>
				<th width="150px">Parent ID<br><hr></th>
				<th width="250px">Name<br><hr></th>
        <th width="250px">Address<br><hr></th>
        <th width="250px">Email<br><hr></th>
        <th width="250px">Phone<br><hr></th>
        <th width="250px">Pupil ID<br><hr></th>
			</tr>
				
			<?php
			/* 	function fetches a result row as an associative array.
              Note: Fieldnames returned from 
			  this function are case-sensitive.
			*/	
			$sql = mysqli_query($link, "SELECT Parent_ID, Name, Address, Email, Telephone, Pupil_ID FROM parents_guardians");
			while ($row = $sql->fetch_assoc()){
                echo "
                <tr>
                    <th>{$row['Parent_ID']}</th>
                    <th>{$row['Name']}</th>
                    <th>{$row['Address']}</th>
                    <th>{$row['Email']}</th>
                    <th>{$row['Telephone']}</th>
                    <th>{$row['Pupil_ID']}</th>
                </tr>";
			}
		
      if(isset($_POST['submission'])){
        if (is_numeric($_POST['ID'])){
          $Parent_ID = $_POST['ID'];
          $sql = "DELETE FROM parents_guardians WHERE Parent_ID = $Parent_ID";

          $result = mysqli_query($link, $sql);

          if (!$result){
            echo "Error";

          }else{
              echo "<h1>Parent deleted successfully</h1>";
          }
        }else{
          echo "Please enter a number";
        }
      }
			?>

      
            </table>
        </body>
        </php>


