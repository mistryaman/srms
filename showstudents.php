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
            <h3><b>Students Details List</b></h3><hr>
</div>
</center>
<?php
include 'db.php';

$sql = "SELECT students.sid, students.sname, students.erno,students.collagename,students.sem, courses.cname from students join courses on courses.cid=students.cid";
$data = mysqli_query($conn, $sql);
$num = mysqli_num_rows($data);
?>

<center>
<table class="table col-lg-8">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Er No</th>
		<th>Collage Name</th>
		<th>Sem</th>
		<th>Course Name</th>
		<th>Update Data</th>
		<th>Deleted Data</th>	
	</tr>

<?php
if($num!=0)
{
	while ($result = mysqli_fetch_assoc($data)) {

			echo "<tr><td>".$result['sid']."</td>
			<td>".$result['sname']."</td>
			<td>".$result['erno']."</td>
			<td>".$result['collagename']."</td>
			<td>".$result['sem']."</td>
			<td>".$result['cname']."</td>
			<td><a href='updatestudents.php?id=$result[sid]&&name=$result[sname]&&erno=$result[erno]&&collagename=$result[collagename]&&sem=$result[sem]&&cname=$result[cname]'>Update data</a></td>
			<td><a href='deletestudents.php?id=$result[sid]' onclick='return checkdelete()'>Delete data</a></td>
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