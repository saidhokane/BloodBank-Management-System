<?php
session_start();

include 'includes/db.php';

if(!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit();
}

include 'includes/header.php';

$donors = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM donors"));
$requests = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM requests"));
?>

<section>

<h2>Admin Dashboard</h2>

<div class="cards">

<div class="card">
<h3>Total Donors</h3>
<h1><?php echo $donors; ?></h1>
<p><a href="manage_donors.php">Manage Donors</a></p>
</div>

<div class="card">
<h3>Total Requests</h3>
<h1><?php echo $requests; ?></h1>
<p><a href="manage_requests.php">Manage Requests</a></p>
</div>


<div class="card">
<h3>Logout</h3>
<p><a href="logout.php">Logout</a></p>
</div>

</div>
<div style="text-align:center;margin-top:40px;">

<a href="manage_donors.php" class="btn">
Manage Donors
</a>

<a href="manage_requests.php" class="btn">
Manage Requests
</a>

<a href="logout.php" class="btn btn2">
Logout
</a>

</div>

</div>

</section>

<?php include 'includes/footer.php'; ?>