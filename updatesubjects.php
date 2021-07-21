<?php
    include 'db.php';
    include 'header.php';
    // session_start();
    $id = $_GET['id'];
    $subname= $_GET['subname'];
    $sem=$_GET['sem'];
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

// $cnameError = = $cname 
$subnameError  = $semError = $cidError = "";
$usubname = $usem = $ucid = "";

if (isset($_POST['submit'])){

        $usubname = $_POST["usubname"];
		if (empty($usubname)) {
        		 $subnameError = "Subject Name is required";  
    		} else {
                $subname = $usubname; 
          	  if (!preg_match("/^[a-zA-Z ]*$/",$subname)) {  
                $subnameError = "Only alphabets and white space are allowed";  
            	}  
    		}

            $usem = $_POST['usem'];
           if(empty($usem)){
                    $semError = "plaese choose your Sem";
                   }

            // $cname = $_POST['cname'];
            // if(empty($cname)){
            //         $cnameError = "plaese choose your course";
            //         }

		$ucid = $_POST['ucid'];
            if(empty($ucid)){
                   $cidError = "plaese choose your course";
                }

if(!$usubname && !$usem && !$ucid) {
// echo "hello";
	$insertdata = "UPDATE `subject` SET `subname`='$usubname',`sem`='$usem',`cid`='$ucid' WHERE subid = '$id'";
//    echo $insertdata;
	$data = mysqli_query($conn,$insertdata);
		if (!$data) {
		echo "try again".mysqli_error($conn);
		}else{
           
			$msg="Your Course Inserted";
		}		
	}else{
        // echo "hello";
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
    
    <label style="margin-right:40px;">Select course: </label>
    <!-- <input type="hidden" name = "cname"> -->
    <select name="ucid" value='<?php echo $cid;?>'>
    <option value="">Select course</option>
    <?php
    $sql = mysqli_query($conn, "SELECT * From courses");
    $row = mysqli_num_rows($sql);
    while ($row = mysqli_fetch_array($sql)){
    echo "<option value='". $row['cid'] ."'>".$row['cname'] ."</option>" ;
    }
    ?>
    </select>
    <span style=" margin-left: 40px;"><?php echo $cidErrorr;?></span>
    <br>
    <br>
    <label style="margin-right:45px;"> Select Sem:</label>
    <select name="usem" value='<?php echo $sem;?>'>
    <option>Select Sem</option>
    <option value="Sem 1">Sem 1</option>
    <option value="Sem 2">Sem 2</option>
    <option value="Sem 3">Sem 3</option>
    <option value="Sem 4">Sem 4</option>
    <option value="Sem 5">Sem 5</option>
    <option value="Sem 6">Sem 6</option>
    <option value="Sem 7">Sem 7</option>
    <option value="Sem 8">Sem 8</option>
    </select>
    <span style=" margin-left: 40px;"><?php echo $semError;?></span>
    <br>
    <br>

    <label style="margin-right:63px;">Subject Name: </label>
    <input type="hidden" name ="subid">
    <input type="text" name="usubname" placeholder="Enter Subject Name" value="<?php echo $subname; ?>" >
    <span > <?php echo $subnameError; ?></span>
    <br>
    <br>

    <input type="submit" name="submit" value="Add Subject">
    </form> <br>
<form>
<button><a href="showsubjects.php">Show Subjects</a></button>
</form>
</center>
</body>
</html>