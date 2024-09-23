<?php 
include 'conn.php';



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Form</h2>
  <form action="save.php" method ="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>

    <input type="file" name="image" required>


    <select name="sel_cat" id="sel_cat_id">
        <option value="">Select</option>
        <?php
        $sql = "SELECT * FROM State";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['sid'];
            $name = $row['state'];
            $selected = ($sel_cat == $id) ? "selected" : ""; // Check if this option should be selected

            echo "<option value='$id' $selected>$name</option>";
        }
        ?>
    </select>

    <button type="submit" class="btn btn-default" name="add-btn">Submit</button>
  </form>
</div>

</body>
</html>
