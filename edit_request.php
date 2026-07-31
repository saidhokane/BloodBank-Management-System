<?php
session_start();

include 'includes/db.php';

if(!isset($_SESSION['admin']))
{
header("Location:login.php");
exit();
}

$id=$_GET['id'];

$result=mysqli_query($conn,"SELECT * FROM requests WHERE id='$id'");
$row=mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{

$patient=$_POST['patient'];
$blood=$_POST['blood'];
$units=$_POST['units'];
$hospital=$_POST['hospital'];
$contact=$_POST['contact'];
$address=$_POST['address'];

mysqli_query($conn,"UPDATE requests SET

patient_name='$patient',
blood_group='$blood',
units='$units',
hospital='$hospital',
contact='$contact',
address='$address'

WHERE id='$id'");

echo "<script>
alert('Request Updated');
window.location='manage_requests.php';
</script>";

}

include 'includes/header.php';
?>

<section>

<h2>Edit Blood Request</h2>

<form method="POST">

<input type="text"
name="patient"
value="<?php echo $row['patient_name'];?>"
required>

<select name="blood">

<?php

$groups=["A+","A-","B+","B-","AB+","AB-","O+","O-"];

foreach($groups as $g)
{

?>

<option
value="<?php echo $g;?>"

<?php
if($row['blood_group']==$g)
echo "selected";
?>

>

<?php echo $g;?>

</option>

<?php
}
?>

</select>

<input type="number"
name="units"
value="<?php echo $row['units'];?>"
required>

<input type="text"
name="hospital"
value="<?php echo $row['hospital'];?>"
required>

<input type="text"
name="contact"
value="<?php echo $row['contact'];?>"
required>

<textarea
name="address"
required><?php echo $row['address'];?></textarea>

<button
type="submit"
name="update">

Update Request

</button>

</form>

</section>

<?php include 'includes/footer.php'; ?>