<?php
if (isset($_POST['sumbit'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pixpresenze";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // receive all input values from the form
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $price = mysqli_real_escape_string($conn, $_POST['pirce']);
    $pcat = mysqli_real_escape_string($conn, $_POST['pcat']);
    $product_details = mysqli_real_escape_string($conn, $_POST['pdetails']);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO products (product_name,product_price,product_cat,product_details)
            VALUES ('$pname', '$price', '$pcat','product_details')";
    if ($conn->query($sql) === true) {
        echo "alert('Nuovo record inserito')";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>
