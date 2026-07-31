<?php
session_start();

include 'includes/db.php';

if(!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit();
}

include 'includes/header.php';
?>

<section>

<h2>Manage Donors</h2>

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
<th>Last Donation</th>
<th>Action</th>
</tr>

<?php

$result = mysqli_query($conn,"SELECT * FROM donors ORDER BY id DESC");

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
<td><?php echo $row['last_donation']; ?></td>

<td>
<a href="edit_donor.php?id=<?php echo $row['id']; ?>">Edit</a> |
<a href="delete_donor.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this donor?');">Delete</a>
</td>

</tr>

<?php
}
?>

</table>

</section>

<?php include 'includes/footer.php'; ?>