<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport">
    <title>show Student Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>


<?php

include 'db.php';
include 'header.php';
session_start();

$msg="";

$courseError= "";
$course="";

if (isset($_POST['submit'])){

		//name validation
		$cname = $_POST["cname"];
		if (empty($_POST["cname"])) {  
        		 $nameError = "Course Name is required";  
    		} else {  
        		$course = $cname;  
          	  // check if name only contains letters and whitespace  
          	  if (!preg_match("/^[a-zA-Z ]*$/",$course)) {  
                $courseError = "Only alphabets and white space are allowed";

            	}  
    		}  

if(!$cname){

	$insertdata = "INSERT INTO `courses`(`cname`) VALUES ('$cname')";

	$data = mysqli_query($conn,$insertdata);
		if (!$data) {
		echo "try again".mysqli_error($conn);
		}else{
			$msg="Your Course Inserted";
		}		
	}else{	
		$msg= "Please Enter valid data";
	}
}

?>

<body>
<center>
<div class= "col-lg-7">
        <div class="flex-container">
            <img src="gtu.png" alt="GTU" style="width:50px;height:60px;margin:10px;">
            <h2>GUJARAT TECHNOLOGICAL UNIVERSITY</h2>
            <img src="gtu.png" alt="GTU" style="width:50px;height:60px;margin:10px;">
        </div>
            <h3><b>Add Students Courses</b></h3><hr>
</div>
</center>

<center>
<h3><?php echo $msg;?></h3>
    <form  method="post" enctype="multipart/form-data">
    
    <label style="margin-right:63px;">Course Name: </label>
    <input type="text" name="cname" placeholder="For Ex: IT, CE, Mech." value="<?php echo $cname; ?>" >
    <span > <?php echo $courseError; ?></span>
    <br>
    <br>

    <input type="submit" name="submit" value="Add Courses">
    </form> <br>
<form>
<button><a href="showcourses.php">Show Courses</a></button>
</form>
</center>
</body>
</html>