
<?php
include("connection.php");

$id = $_GET['id'];

$query = "DELETE FROM FORM WHERE id='$id'";
$data = mysqli_query($conn, $query);

if ($data) {
    echo "<script>alert('Record Updated')</script>";
    ?>
    <meta http-equiv="refresh" content="0;URL=http://localhost/crud/display.php" /> 
    <?php


} else {
    echo "Fail";
}
?>
