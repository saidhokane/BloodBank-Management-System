<?php
include 'includes/db.php';
include 'includes/header.php';

if(isset($_POST['submit']))
{
    $patient_name = $_POST['patient_name'];
    $blood_group = $_POST['blood_group'];
    $units = $_POST['units'];
    $hospital = $_POST['hospital'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $sql = "INSERT INTO requests
    (patient_name, blood_group, units, hospital, contact, address)
    VALUES
    ('$patient_name', '$blood_group', '$units', '$hospital', '$contact', '$address')";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>alert('Blood Request Submitted Successfully');</script>";
    }
    else
    {
        echo "<script>alert('Error: ".mysqli_error($conn)."');</script>";
    }
}
?>

<section class="form-section">

<h2>Blood Request Form</h2>

<form method="POST">

<input type="text" name="patient_name" placeholder="Patient Name" required>

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

<input type="number" name="units" placeholder="Units Required" required>

<input type="text" name="hospital" placeholder="Hospital Name" required>

<input type="text" name="contact" placeholder="Contact Number" required>

<textarea name="address" placeholder="Address" required></textarea>

<button type="submit" name="submit">
    Submit Request
</button>

</form>

</section>

<?php include 'includes/footer.php'; ?>