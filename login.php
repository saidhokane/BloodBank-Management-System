<?php
session_start();

include 'includes/db.php';
include 'includes/header.php';

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['admin'] = $username;

        echo "<script>
        alert('Login Successful');
        window.location='dashboard.php';
        </script>";
    }
    else
    {
        echo "<script>alert('Invalid Username or Password');</script>";
    }
}
?>

<section>

<h2>Admin Login</h2>

<form method="POST">

<input type="text"
name="username"
placeholder="Username"
required>

<input type="password"
name="password"
placeholder="Password"
required>

<button type="submit" name="login">
Login
</button>

</form>

</section>

<?php include 'includes/footer.php'; ?>