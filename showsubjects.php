<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
<body>
<center>
<div class= "col-lg-7">
        <div class="flex-container">
            <img src="gtu.png" alt="GTU" style="width:50px;height:60px;margin:10px;">
            <h2>GUJARAT TECHNOLOGICAL UNIVERSITY</h2>
            <img src="gtu.png" alt="GTU" style="width:50px;height:60px;margin:10px;">
        </div>
            <h3><b>Courses Details List</b></h3><hr>
</div>
</center>
<?php
include 'db.php';
$sql = "SELECT * FROM `subject`";
$data = mysqli_query($conn, $sql);
$num = mysqli_num_rows($data);
?>

<center>
<table class="table col-lg-8">
	<tr>
        <th>Id</th>
		<th>Subject Name</th>
        <th>Sem</th>
        <!-- <th>Course Name</th> -->
		<th>Update Data</th>
		<th>Deleted Data</th>	
	</tr>

<?php
if($num!=0)
{
	while ($result = mysqli_fetch_assoc($data)) {

			echo "<tr><td>".$result['subid']."</td>
			<td>".$result['subname']."</td>
            <td>".$result['sem']."</td>
			<td><a href='updatesubjects.php?id=$result[subid]&&subname=$result[subname]&&sem=$result[sem]'>Update data</a></td>
			<td><a href='deletesubjects.php?id=$result[subid]' onclick='return checkdelete()'>Delete data</a></td>
			</tr>";

	}
}
?>
</table>
</center>

<script>
	function checkdelete(){
		return confirm("Are you sure want to delete?");
	}
</script>
</body>
</html>