<?php
include 'includes/db.php';
include 'includes/header.php';
?>

<section>

<h2>Search Blood Donor</h2>

<form method="GET">

<select name="blood_group" required>

<option value="">Select Blood Group</option>
<option>A+</option>
<option>A-</option>
<option>B+</option>
<option>B-</option>
<option>AB+</option>
<option>AB-</option>
<option>O+</option>
<option>O-</option>

</select>

<button type="submit" name="search">Search</button>

</form>

<?php

if(isset($_GET['search']))
{

    $blood_group=$_GET['blood_group'];

    $sql="SELECT * FROM donors WHERE blood_group='$blood_group'";

    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {

?>

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>Age</th>
<th>Gender</th>
<th>Blood Group</th>
<th>Mobile</th>
<th>Email</th>
<th>Address</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['fullname']; ?></td>
<td><?php echo $row['age']; ?></td>
<td><?php echo $row['gender']; ?></td>
<td><?php echo $row['blood_group']; ?></td>
<td><?php echo $row['mobile']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['address']; ?></td>

</tr>

<?php

}

?>

</table>

<?php

}
else
{
    echo "<h3 style='text-align:center;color:red;'>No Donor Found</h3>";
}

}

?>

</section>

<?php include 'includes/footer.php'; ?>