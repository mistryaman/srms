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
    
    $sname = $erno = $collagename = $sem = $cid ="";
    $nameError = $ernoError = $collagenameError = $semError = $cidError ="";

    if (isset($_POST['submit'])){
        
        $studentname = $_POST["sname"];
		if (empty($_POST["sname"])) {
        		 $nameError = "Name is required";  
    		} else {
                $sname = $studentname; 
          	  if (!preg_match("/^[a-zA-Z ]*$/",$sname)) {  
                $nameError = "Only alphabets and white space are allowed";  
            	}  
    		}

        $studenterno = $_POST["erno"];
        if(empty($_POST["erno"])) {
    			$ernoError = "Er number is required";
    		}else{
                $erno = $studenterno;
    			if(!preg_match("/^[0-9]*$/",$erno)){
    				$ernoError = "Number must be digit";
    			}
    			if(strlen($erno)!=12){
    				$ernoError = "number must be 12 digits";
    			}
    		}

        $studentcollagename = $_POST["collagename"];
        if (empty($_POST["collagename"])) {  
                $collagenameError = "Collage Name is required";  
           } else {
                $collagename = $studentcollagename;
               if (!preg_match("/^[a-zA-Z ]*$/",$collagename)) {  
               $collagenameError = "Only alphabets and white space are allowed";  
               }  
           }

           $sem = $_POST['sem'];
        //    echo "$sem";
           if(empty($sem)){
                       $semError = "plaese choose your Sem";
                   }

           $cid = $_POST['cid'];
        //    echo "$cid";
            if(empty($cid)){
                   $cidError = "plaese choose your course";
                }

      
   if(!$studentname && !$studenterno && !$studentcollagename  &&  !$sem && !$cid){

	$insertdata = "INSERT INTO `students`(`sname`, `erno`, `collagename`, `sem`, `cid`) VALUES ('$studentname','$studenterno','$studentcollagename','$sem','$cid')";
   
	$data = mysqli_query($conn,$insertdata);
		
    if (!$data) {
		echo "try again".mysqli_error($conn);
		}else{
			$msg="Your Data Inserted";
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
            <h3><b>Students Details Form</b></h3><hr>
</div>
</center>

<center>
<h3><?php echo $msg;?></h3>
    <form  method="post" enctype="multipart/form-data">
    <label style="margin-right:63px;">Name: </label>
    <input type="text" name="sname" placeholder="Enter Your Name" value="<?php echo $sname; ?>" >
    <span > <?php echo $nameError; ?></span>
    <br>
    <br>

    <label style="margin-right:63px;">Er No: </label>
    <input type="number" name="erno" placeholder="Enter Your Er No" value="<?php echo $erno; ?>" >
    <span > <?php echo $ernoError; ?></span>
    <br>
    <br>

    <label style="margin-right:10px;">collage Name: </label>
    <input type="text" name="collagename" placeholder="Enter Your Collage Name" value="<?php echo $collagename; ?>" >
    <span > <?php echo $collagenameError; ?></span>
    <br>
    <br>

    <label style="margin-right:40px;">Select courses: </label>
    <select name="cid" value='<?php echo $cid;?>'>
    <option value="">Select courses</option>
    <?php
    $sql = mysqli_query($conn, "SELECT * From courses");
    $row = mysqli_num_rows($sql);
    while ($row = mysqli_fetch_array($sql)){
    echo "<option value='". $row['cid'] ."'>" .$row['cname'] ."</option>" ;
    }
    ?>
    </select>
    <span style=" margin-left: 40px;"><?php echo $cidErrorr;?></span>
    <br>
    <br>
    <label style="margin-right:45px;"> Select Sem:</label>
    <select name="sem" value='<?php echo $sem;?>'>
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
    <input type="submit" name="submit" value="Submit Form">
    <button><a href="index1.php">Courses Details</a></button>
    </form> <br>
<form action="showstudents.php">
<button><a href="showstudents.php">Show Data</a></button>
</form>
</center>
</body>
</html>