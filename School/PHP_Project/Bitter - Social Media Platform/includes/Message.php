<?php
if (isset($_GET["message"])) {
        $message = $_GET["message"];
        if ($message != "") {
            echo "<script>alert('$message')</script>";
        }
    }
?>
