<!DOCTYPE html>

<?php
if (isset($_GET["message"])) {
    if ($message != "") {
        echo "<script>alert('$message')</script>";
    }
}
?>
<html>
    <head></head>
    
    <body>
        <!--method="get" is the default -->
        <form method="post" action="Chap27_proc.php">
            <label>Name:</label><input type="text" name="txtName"><br>
            <label>Email: </label><input type="email" name="txtEmail"><br>
            <input type="submit">
            <button type="submit">Go</button>             
            
        </form>
        
    </body>
</html>
