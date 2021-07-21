<?php
    include 'db.php';
    include 'header.php';
    // session_start();
    $id = $_GET['id'];
    $name= $_GET['name'];
    $erno = $_GET['erno'];
    $collagename= $_GET['collagename'];
    $sem= $_GET['sem'];
    $cname= $_GET['cname'];
    $cid= $_GET['cid'];
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
    $uname = $uerno = $ucollagename = $sem = $cid = $cname="";
    $nameError = $ernoError = $collagenameError = $semError = $cidError= $cnameError="";

    if (isset($_POST['submit'])) {
        
        $studentname = $_POST["uname"];
		if (empty($_POST["uname"])) {
        		 $nameError = "Name is required";  
    		} else {
                $uname = $studentname; 
          	  if (!preg_match("/^[a-zA-Z ]*$/",$uname)) {  
                $nameError = "Only alphabets and white space are allowed";  
            	}  
    		}

        $studenterno = $_POST["uerno"];
        if(empty($_POST["uerno"])) {
    			$ernoError = "Er number is required";
    		}else{
                $uerno = $studenterno;
    			if(!preg_match("/^[0-9]*$/",$uerno)){
    				$ernoError = "Number must be digit";
    			}
    			if(strlen($uerno)!=12){
    				$ernoError = "number must be 12 digits";
    			}
    		}

        $studentcollagename = $_POST["ucollagename"];
        if (empty($_POST["ucollagename"])) {  
                $collagenameError = "Collage Name is required";  
           } else {
                $ucollagename = $studentcollagename;
               if (!preg_match("/^[a-zA-Z ]*$/",$ucollagename)) {  
               $collagenameError = "Only alphabets and white space are allowed";  
               }  
           }

           $sem = $_POST['usem'];
           //    echo "$sem";
              if(empty($sem)){
                          $semError = "plaese choose your Sem";
                      }
   
              $cid = $_POST['cid'];
           //    echo "$cid";
               if(empty($cid)){
                      $cidError = "plaese choose your course";
                   }

                   $cname = $_POST['cname'];
           //    echo "$cid";
               if(empty($cname)){
                      $cnameError = "plaese choose your course";
                   }


   if(!$studentname && !$studenterno && !$studentcollagename  &&  !$sem && !$cid && !$cname){

	$sql = "UPDATE students, courses SET students.sname = '$studentname', students.erno = '$studenterno', students.collagename = '$studentcollagename', 
    students.sem = '$sem', students.cid = '$cid' courses.cname = '$cname'
    WHERE sid = '$id'";
    
    $data = mysqli_query($conn,$sql);
		if (!$data) {
		echo "try again".mysqli_error($conn);
		}else{
			header("location:showstudents.php");
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
            <h3><b>Students Details Update Form</b></h3><hr>
</div>
</center>

<center>
<h3><?php echo $msg;?></h3>
<form  method="post" enctype="multipart/form-data">
    <label style="margin-right:63px;">Name: </label>
    <input type="hidden" name="sid" value="<?php echo $id; ?>" >
    <input type="text" name="uname" placeholder="Enter Your Name" value="<?php echo $name; ?>" >
    <span > <?php echo $nameError; ?></span>
    <br>
    <br>

    <label style="margin-right:63px;">Er No: </label>
    <input type="number" name="uerno" placeholder="Enter Your Er No" value="<?php echo $erno; ?>" >
    <span > <?php echo $ernoError; ?></span>
    <br>
    <br>

    <label style="margin-right:10px;">collage Name: </label>
    <input type="text" name="ucollagename" placeholder="Enter Your Collage Name" value="<?php echo $collagename; ?>" >
    <span > <?php echo $collagenameError; ?></span>
    <br>
    <br>
    <label style="margin-right:40px;">Select courses: </label>
    <select name="cname" value='<?php echo $cname;?>'>
    <option value="">Select courses</option>
    <?php
    $query = mysqli_query($conn, "SELECT * FROM courses");
    $result1 = mysqli_num_rows($query);
    while ($row1 = mysqli_fetch_array($result1)){
    echo "<option value='". $row1['cid'] ."'>" .$row1['cname'] ."</option>" ;
    }
    echo "</select>";
    ?>
    <span style=" margin-left: 40px;"><?php echo $cidErrorr;?></span>
    <br>
    <br>
    
    <label style="margin-right:45px;"> Select Sem:</label>
    <select name="usem" value='<?php echo $sem;?>'>
    <option>Select Sem</option>
    <option value="sem 1" >sem 1</option>
    <option value="sem 2" >sem 2</option>
    <option value="sem 3" >sem 3</option>
    <option value="sem 4" >sem 4</option>
    <option value="sem 5" >sem 5</option>
    <option value="sem 6" >sem 6</option>
    <option value="sem 7" >sem 7</option>
    <option value="sem 8" >sem 8</option>
    </select>
    <span style=" margin-left: 40px;"><?php echo $semError;?></span>
    <br>
    <br>
    <input type="submit" name="submit" value="Submit Updated Form">
    </form>
    <br>
</center>
</body>
</html>