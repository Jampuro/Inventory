<?php
// Include dataCollection.php to access the database connection
include_once 'dataCollection.php';
session_start(); // Can be removed if not used elsewhere

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Listing</title>
  <link rel="stylesheet" type="text/css" href="design.css">
</head>
<body>

  <h2>Product List</h2>

  <?php
  // Prepare the SQL query to select all data (excluding comparePrice)
  $sql = "SELECT product_name, product_description, product_price, product_stock FROM shopping";

  // Execute the query using the connection
  $result = mysqli_query($conn, $sql);

  // Check if query execution was successful
  if ($result) {
    // Check for results using mysqli_num_rows
    if (mysqli_num_rows($result) > 0) {
      echo "<table>
        <tr>
          <th>Product Name</th>
          <th>Product Description</th>
          <th>Product Price</th>
          <th>Product Stock</th>
        </tr>";
      // Loop through each row and display data
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
          <td>" . $row["product_name"] . "</td>
          <td>" . $row["product_description"] . "</td>
          <td>" . $row["product_price"] . "</td>
          <td>" . $row["product_stock"] . "</td>
        </tr>";
      }
      echo "</table>";
    } else {
      echo "No products found.";
    }
  } else {
    // Handle query execution failure (optional)
    echo "Error executing query: " . mysqli_error($conn);
  }

  // Close the connection (optional but recommended)
  mysqli_close($conn);
  ?>

</body>
</html>
