<?php
session_start(); 

// Here we run a login check
if (!isset($_SESSION['id'])) { 
   echo 'Please <a href="login.php">log in</a> to access your account';
   exit(); 
}
//Connect to the database through our include 
include_once "database.php";

// Place Session variable 'id' into local variable
$id = $_SESSION['id'];
// Process the form if it is submitted
if ($_POST['qualific']) {
    $fullname = $_POST['fullname'];
                    $contact = $_POST['contact'];
                    $qualific = $_POST['qualific'];

$sql = mysql_query("UPDATE jobseeker_members SET fullname='$fullname', contact='$contact', qualification='$qualific'  WHERE id='$id'");

 echo 'Your account info has been updated, visitors to your profile will now see the new info.<br /><br />
To return to your profile edit area, <a href="member_account.php">click here</a>';

exit();
} // close if post
?>

<?php
// Query member data from the database and ready it for display
$sql = mysql_query("SELECT * FROM jobseeker_members WHERE id='$id' LIMIT 1");
while($row = mysql_fetch_array($sql)){
$fullname = $row["fullname"];
$contact = $row["contact"];
$qualific = $row["qualification"];
}
?>
    <?php

    $fullname="";
    $fullnameErr="";

    function test_input($data)
    {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
    }

if ($_SERVER['REQUEST_METHOD']== "POST") {
   $valid = true;
   if(empty($_POST["fullname"]))
{
    $fullnameErr="* Fullname is Required";
    $valid=false;
}
else
{
    $fullname=test_input($_POST["fullname"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$fullname))
     {
      $fullnameErr = "&nbsp;&nbsp;Only letters and white space allowed"; 
      $valid=false;
     }
}}

?>

<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" name="form" id="form" onsubmit="return validate_form ( );">
          <label>FullName:</label>
          <input class="txtbox" name="fullname" type="text" id="fullname"
          value="<?php echo "$fullname"?>"/>
          <span><?php echo $fullnameErr?></span><br>
 <label>Contact No:</label>
            <input class="txtbox"name="contact" type="text" id="contact" value="<?php echo "$contact"; ?>" /><br>
 <label>Qualification :</label>
            <select class="txtbox" name = "qualific">
              <option value="<?php echo "$qualific"; ?>"><?php echo "$qualific"; ?></option>
              <option value="Below SSC(10 Std)">Below SSC(10 Std)</option>
              <option value="SSC(10 Std) passed">SSC(10 Std) passed</option>
              <option value="HSC(12 Std) passed">HSC(12 Std) passed</option>
              <option value="Graduate">Graduate</option>
              <option value="Post Graduate">Post Graduate</option>
            </select>
<input  class="submitbtn" name="Submit" type="submit" value="Save" />
</form>