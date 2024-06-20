<?php

// Include dataCollection.php to access the database connection
include_once 'dataCollection.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {

  // Get form data
  $product_name = $_POST['productName'];
  $product_description = $_POST['productDescription'];
  $product_price = $_POST['productPrice'];
  $product_stock = $_POST['productStock'];

  // Prepare the SQL query for insertion
  $sql = "INSERT INTO shopping (product_name, product_description, product_price, product_stock) VALUES (?, ?, ?, ?)";

  // Prepare the statement (optional but recommended for security)
  $stmt = mysqli_prepare($conn, $sql);

  // Check if statement preparation was successful
  if ($stmt) {

    // Bind parameters to the prepared statement (optional but recommended)
    mysqli_stmt_bind_param($stmt, "ssss", $product_name, $product_description, $product_price, $product_stock);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
      echo "Product added successfully!";
    } else {
      echo "Error adding product: " . mysqli_error($stmt);
    }

    // Close the prepared statement (optional but recommended)
    mysqli_stmt_close($stmt);
  } else {
    echo "Error preparing statement: " . mysqli_error($conn);
  }

} else {
  // Handle invalid access (optional)
  echo "Unauthorized access";
}

// Close the connection (optional but recommended)
mysqli_close($conn);

?>