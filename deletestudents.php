<?php
include 'db.php';

$id = $_GET['id'];


$sql = "DELETE FROM students WHERE sid = $id";
$data = mysqli_query($conn, $sql);
if (!$data) {
            echo "try again".mysqli_error($conn);
		    }else{
               echo "<script>alert('Record Deleted!')</script>";
			    header("location:showstudents.php");
		}

?>


<!-- DELETE students,courses FROM students
INNER JOIN
courses ON courses.cid = students.cid 
WHERE
students.sid = $id; -->