<?php

include_once 'dataCollection.php';

session_start();

if (isset($_POST['submit'])) {

  $ProductName = $_POST['ProductName'];
  $ProductDescription = $_POST['ProductDescription'];
  $ProductPrice = $_POST['ProductPrice'];
  $ProductStock = $_POST['ProductStock'];

  // ... (Store data in session, as needed)

  // Prepare the SQL query (adjusted for 4 placeholders)
  $query = "INSERT INTO shopping (ProductStock, ProductDescription, ProductPrice, ProductStock) VALUES (?, ?, ?, ?)";

  // Prepare the statement using the connection from dataCollection.php
  $stmt = $conn->prepare($query);

  // Check for prepare statement errors (optional but recommended)
  if (!$stmt) {
    echo "Error preparing statement: " . mysqli_error($conn);
    exit(); // Exit script to prevent further execution
  }

  // Bind parameters with 4 variables (matching query placeholders)
  $stmt->bind_param("ssii", $ProductName, $ProductDescription, $ProductPrice, $ProductStock);

  // ... (Execute statement, handle success/failure, close statement)
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product listing</title>
    <link rel="stylesheet" type="text/css" href="design.css">
</head>
<body>
    <div class="form-container">
        <form method="post" action="process.php">
            <h1>Product Listing Form</h1>
            <div class="form-group">
                <label for="productName">Product name:</label>
                <input type="text" id="productName" name="productName">
            </div>
            <div class="form-group">
                <label for="productDescription">Product description:</label>
                <textarea id="productDescription" name="productDescription"></textarea>
            </div>
            <div class="form-group">
                <label for="productPrice">Product price:</label>
                <input type="number" id="productPrice" name="productPrice">
            </div>
            <div class="form-group">
                <label for="productStock">Product stock:</label>
                <input type="number" id="productStock" name="productStock">
            </div>
            <button type="submit" name="submit">Add Product</button>
        </form>
    </div>
</body>
</html>


