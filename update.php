<?php 
include 'conn.php';

$id = $_GET['id'];
$update_sid = $_GET['sid'];

$f_sql = "select s.image_name as image,s.id as Stuid,s.email as mail,s.pwd as pswd,s.state,st.sid as sid,st.state  as States from student as s,state as st where s.state = st.sid and s.id=$id ";
$f_query = mysqli_query($conn, $f_sql);

while ($row = mysqli_fetch_array($f_query)){

    $email = $row['mail'];
    $pwd = $row['pswd'];
    $id = $row['Stuid'];
    $image_name = $row['image'];
    // $sid = $row['sid'];
}

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
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" value="<?php echo isset($pwd) ? $pwd : ''; ?>">
    </div>

    <div class="form-group">
      <label for="pwd">Id</label>
      <input type="text" class="form-control" id="id" placeholder="" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
    </div>


    <div class="form-group">
    <label for="image">Current Image:</label>
    <!-- the image if it exists -->
    <?php if (isset($image_name) && !empty($image_name)): ?>
        <img src="uploads/<?php echo $image_name; ?>" alt="Image" width="100" height="100"><br>
    <?php endif; ?>
  
    <input type="file" name="image">
</div>


   <select name="sel_cat" id="sel_cat_id">
        <option value="">Select</option>
        <?php
        $sql = "SELECT * FROM State";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['sid'];
            $name = $row['state'];

            $selected = ($id == $update_sid) ? "selected" : ""; // Check if this option should be selected

            echo "<option value='$id' $selected>$name</option>";

        }
        ?>
    </select>

    <button type="submit" class="btn btn-default" name="upd-btn">Submit</button>
  </form>
</div>

</body>
</html>
