<?php
session_start();

include 'includes/db.php';

if(!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM donors WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $last_donation = $_POST['last_donation'];

    mysqli_query($conn,"UPDATE donors SET
        fullname='$fullname',
        age='$age',
        gender='$gender',
        blood_group='$blood_group',
        mobile='$mobile',
        email='$email',
        address='$address',
        last_donation='$last_donation'
        WHERE id='$id'");

    echo "<script>
    alert('Donor Updated Successfully');
    window.location='manage_donors.php';
    </script>";
}

include 'includes/header.php';
?>

<section>

<h2>Edit Donor</h2>

<form method="POST">

<input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" required>

<input type="number" name="age" value="<?php echo $row['age']; ?>" required>

<select name="gender">

<option <?php if($row['gender']=="Male") echo "selected"; ?>>Male</option>

<option <?php if($row['gender']=="Female") echo "selected"; ?>>Female</option>

<option <?php if($row['gender']=="Other") echo "selected"; ?>>Other</option>

</select>

<select name="blood_group">

<?php

$groups=["A+","A-","B+","B-","AB+","AB-","O+","O-"];

foreach($groups as $g)
{
?>
<option value="<?php echo $g; ?>" <?php if($row['blood_group']==$g) echo "selected"; ?>>
<?php echo $g; ?>
</option>
<?php
}
?>

</select>

<input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" required>

<input type="email" name="email" value="<?php echo $row['email']; ?>">

<textarea name="address" required><?php echo $row['address']; ?></textarea>

<label>Last Donation Date</label>

<input type="date" name="last_donation" value="<?php echo $row['last_donation']; ?>">

<button type="submit" name="update">Update Donor</button>

</form>

</section>

<?php include 'includes/footer.php'; ?>