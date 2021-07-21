<?php
include 'db.php';

$id = $_GET['id'];


$sql = "DELETE FROM `subject` WHERE subid = '$id'";
$data = mysqli_query($conn, $sql);
if (!$data) {
            echo "try again".mysqli_error($conn);
		    }else{
               echo "<script>alert('Record Deleted!')</script>";
			    header("location:showsubjects.php");
		}

?>