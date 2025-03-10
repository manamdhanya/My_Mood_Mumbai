<?php
$directory = "/Applications/XAMPP/xamppfiles/temp/";

if (is_writable($directory)) {
    echo "The directory is writable.";
} else {
    echo "The directory is not writable.";
}
?>