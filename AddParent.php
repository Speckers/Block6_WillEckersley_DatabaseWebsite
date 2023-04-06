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

<h3>Add Parents</h3>
	<form action="AddParent.php" method="post" >
<input type="text"name="Name"placeholder = "Name">
<input type="text"name="Address"placeholder = "Address">
<input type="text"name="Email"placeholder = "Email">
<input type="text"name="Telephone"placeholder = "Phone">
<input type="text"name="Pupil_ID"placeholder = "Pupil ID">
<input type="submit"name="submission">


  </form>
		<table>
		
			<tr>
				<th width="150px">Parent ID<br><hr></th>
				<th width="250px">Name<br><hr></th>
                <th width="250px">Address<br><hr></th>
                <th width="250px">Email<br><hr></th>
                <th width="250px">Telephone<br><hr></th>
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
          $Name = $_POST['Name'];
          $Address = $_POST['Address'];
          $Email = $_POST['Email'];
          $Telephone = $_POST['Telephone'];
          $Pupil_ID = $_POST['Pupil_ID'];
          $sql = "INSERT INTO `parents_guardians` (`Name`, `Address`, `Email`, `Telephone`, `Pupil_ID`) VALUES ('$Name', '$Address', '$Email', '$Telephone', '$Pupil_ID')";
          
          
          $result = mysqli_query($link, $sql);

          if (!$result){
            echo "Error";
            echo $sql;
          }else{
              echo "<h1>Parent added successfully</h1>";
          }
      }
			?>

      
            </table>
        </body>
        </php>


