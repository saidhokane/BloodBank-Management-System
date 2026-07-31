<?php

session_start();

include 'includes/db.php';

if(!isset($_SESSION['admin']))
{
header("Location:login.php");
exit();
}

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM requests WHERE id='$id'");

echo "<script>

alert('Request Deleted Successfully');

window.location='manage_requests.php';

</script>";

?>