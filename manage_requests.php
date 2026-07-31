<?php
session_start();
include 'includes/db.php';

if(!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit();
}

if(isset($_GET['approve']))
{
    $id = $_GET['approve'];

    $req = mysqli_query($conn,"SELECT * FROM requests WHERE id='$id'");
    $row = mysqli_fetch_assoc($req);

    $blood = $row['blood_group'];
    $units = $row['units'];

    $stock = mysqli_query($conn,"SELECT * FROM inventory WHERE blood_group='$blood'");
    $inv = mysqli_fetch_assoc($stock);

    if($inv && $inv['units'] >= $units)
    {


        mysqli_query($conn,
        "UPDATE requests
        SET status='Approved'
        WHERE id='$id'");

        echo "<script>alert('Request Approved Successfully');</script>";
    }
    else
    {
        echo "<script>alert('Insufficient Blood Stock');</script>";
    }
}

include 'includes/header.php';
?>

<section>

<h2>Manage Blood Requests</h2>

<table>

<tr>

<th>ID</th>
<th>Patient</th>
<th>Blood</th>
<th>Units</th>
<th>Hospital</th>
<th>Contact</th>
<th>Status</th>
<th>Action</th>

</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM requests ORDER BY id DESC");

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?= $row['id']; ?></td>
<td><?= $row['patient_name']; ?></td>
<td><?= $row['blood_group']; ?></td>
<td><?= $row['units']; ?></td>
<td><?= $row['hospital']; ?></td>
<td><?= $row['contact']; ?></td>
<td><?= $row['status']; ?></td>

<td>

<?php
if($row['status']=="Pending")
{
?>

<a href="manage_requests.php?approve=<?= $row['id']; ?>">
Approve
</a>

|

<?php
}
?>

<a href="edit_request.php?id=<?= $row['id']; ?>">
Edit
</a>

|

<a href="delete_request.php?id=<?= $row['id']; ?>"
onclick="return confirm('Delete this request?')">
Delete
</a>

</td>

</tr>

<?php
}
?>

</table>

</section>

<?php include 'includes/footer.php'; ?>