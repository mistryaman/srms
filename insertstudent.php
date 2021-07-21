<?php
    include 'db.php';

    $name= $erno= $collagename= $branch= $exam = "";
    $nameError= $ernoError= $collagenameError= $branchError= $examError= "";

    if ($_POST['REQUEST_METHOD'] == "POST") {
        
		if (empty($_POST["name"])) {  
        		 $nameError = "Name is required";  
    		} else {
          	  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameError = "Only alphabets and white space are allowed";  
            	}  
    		}

        if(empty($_POST["erno"])) {
    			$ernoError = "Er number is required";
    		}else{
    			$mobile = $usernumber;
    			if(!preg_match("/^[0-9]*$/",$erno)){
    				$ernoError = "Number must be digit";
    			}
    			if(strlen($erno)!=12){
    				$ernoError = "number must be 12 digits";
    			}
    		}

        if (empty($_POST["collagename"])) {  
                $collagenameError = "Collage Name is required";  
           } else {
               if (!preg_match("/^[a-zA-Z ]*$/",$collagename)) {  
               $collagenameError = "Only alphabets and white space are allowed";  
               }  
           }

           if (empty($_POST["branch"])) {  
            $branchError = "Branch Name is required";  
       } else {
           if (!preg_match("/^[a-zA-Z ]*$/",$branch)) {  
           $branchError = "Only alphabets and white space are allowed";  
           }  
       }

       if (empty($_POST["exam"])) {  
        $examError = "Name is required";  
   } else {
       if (!preg_match("/^[a-zA-Z ]*$/","/^[0-9]*$/",$exam)) {  
       $examError = "Only alphabets and white space are allowed";  
       }  
   }


   if($name && $erno && $collagename  &&  $branch && $exam){

	$insertdata = "INSERT INTO `students`(`name`, `erno`, `collagename`, `branch`,`exam`) VALUES ('$name','$erno ','$collagename','$branch','$exam')";

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
