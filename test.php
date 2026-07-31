<?php
include 'includes/db.php';

if ($conn) {
    echo "Database Connected Successfully";
} else {
    echo "Connection Failed";
}
?>