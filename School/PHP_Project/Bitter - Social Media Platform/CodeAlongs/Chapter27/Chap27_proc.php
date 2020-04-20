<?php
if (isset($_POST["txtName"])) {
    //won't get here the first time you visit the page
    //will only get if a form has been submitted via post
    $name = $_POST["txtName"];
    $email = $_POST["txtEmail"];
    echo $name." ".$email."<BR>";
    include("../../connect.php");
//    define("DB_HOST", "localhost");
//    define("DB_USER", "root");
//    define("DB_PASS", "");
//    define("DB_NAME", "productsdemo");
//    
//    global $con;
//    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//    if (!$con) {
//        die('Could not connect: '.mysqlerror());
//    }        
    $sql = "select * from products";
    if ($result = mysqli_query($con, $sql)) { 
        //this is useful for getting number of rows
        //echo mysqli_num_rows($result)."<BR>";
        while($row = mysqli_fetch_array($result)) {
            echo $row["ID"]." ".$row["Category"]."<BR>".$row["Description"]."<BR>";
        }
    }
    //INSERT statement
    $prodId = 13;
    $category = "Sportswear";
    $description = "Hockey Stick";
    $price = 29.99;
    $sql = "Insert into products (ID, Category, Description, Price, Image)
            values ($prodId, $category, $description, $price, 1)";
    mysqli_query($con, $sql);
    if(mysqli_affected_rows($con) == 1){
        echo "INSERT SUCCESSFUL<BR>";
    }
    else {
        echo "ERROR ON INSERT<BR>";
    }
    
    //DELETE statement - rarely used, as content is never fully deleted
    $sql = "delete from products where ID = $prodId";
    //mysqli_query($;.l\
    //]n, $sql);
    //echo (mysqli_affected_rows($con) == 1) ? "DELETE SUCCESFUL<BR>" : "DELETE NOT SUCCESFFUL"; 
    
    //UPDATE statement
    $description = "baseball bat";
    $sql = "update products set Description = '$description' where ID = $prodId";
    mysqli_query($con, $sql); //execute SQL statement
    if(mysqli_affected_rows($con) == 0) {
        echo "UPDATE SUCCESSFUL<BR>";
    }
    elseif (mysqli_affected_rows($con)) {
        echo "no records updated<BR>";
    }
    else {
        echo "mulitple records updated<BR>";
    }
} //end big IF statement 
//header("location:Chap27.php?msg=");
    ?>

