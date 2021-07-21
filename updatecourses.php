<?php
    include 'db.php';
    include 'header.php';
    // session_start();
    $id = $_GET['id'];
    $cname= $_GET['cname'];
    // $erno = $_GET['erno'];
    // $collagename= $_GET['collagename'];
    // $branch= $_GET['branch'];
    // $exam= $_GET['exam'];
?>


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

$upname =  "";
$nameError = "";

if (isset($_POST['submit'])) {

	// $upname = $_POST["uname"];
	
$upname = $_POST["uname"];
		if (empty($upname)) {  
        		 $nameError = "Name is required";  
    		} else {  
        		$name = $upname;  
                // echo "insert";
          	  // check if name only contains letters and whitespace  
          	  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameError = "Only alphabets and white space are allowed";  
            	}  
    		}  

if(!$upname){
  $sql = "UPDATE `courses` SET `cname`='$upname'  WHERE  cid=$id";
echo $sql."<br>";

$data = mysqli_query($conn,$sql);
		if (!$data) {
		echo "try again".mysqli_error($conn);
		}else{
			header("location:showcourses.php");
		}
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
            <h3><b>Students Courses Update Form</b></h3><hr>
</div>
</center>

<center>
<h3><?php echo $msg;?></h3>
    <form  method="post" enctype="multipart/form-data">
    <label style="margin-right:63px;">Course Name: </label>
    <input type="hidden" name="uname" placeholder="Enter Course Name" value="<?php echo $id; ?>" >
    <input type="text" name="uname" placeholder="Enter Course Name" value="<?php echo $cname; ?>" >
    <span > <?php echo $nameError; ?></span>
    <br>
    <br>
    <input type="submit" name="submit" value="Submit Updated Form">
    </form> <br>
</center>
</body>
</html>