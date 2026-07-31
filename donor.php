<?php
include 'includes/db.php';
include 'includes/header.php';

if(isset($_POST['submit']))
{
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $last_donation = $_POST['last_donation'];

    $sql = "INSERT INTO donors(fullname,age,gender,blood_group,mobile,email,address,last_donation)
            VALUES('$fullname','$age','$gender','$blood_group','$mobile','$email','$address','$last_donation')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Donor Registered Successfully');</script>";
    }
    else
    {
        echo "<script>alert('Registration Failed');</script>";
    }
}
?>

<section>

<h2>Donor Registration</h2>

<form method="POST">

<input type="text" name="fullname" placeholder="Full Name" required>

<input type="number" name="age" placeholder="Age" required>

<select name="gender" required>
    <option value="">Select Gender</option>
    <option>Male</option>
    <option>Female</option>
    <option>Other</option>
</select>

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

<input type="text" name="mobile" placeholder="Mobile Number" required>

<input type="email" name="email" placeholder="Email">

<textarea name="address" placeholder="Address" required></textarea>

<label>Last Donation Date</label>

<input type="date" name="last_donation">

<button type="submit" name="submit">Register Donor</button>

</form>

</section>

<?php include 'includes/footer.php'; ?>