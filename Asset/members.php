<?php
include('db.php');

$result = mysqli_query($conn, "SELECT * FROM members");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Member List</title>
</head>
<body>
  <h2>Registered Members</h2>
  <table border="1" cellpadding="10">
    <tr>
      <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Course</th><th>Registered At</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['full_name'] ?></td>
      <td><?= $row['email'] ?></td>
      <td><?= $row['phone'] ?></td>
      <td><?= $row['course'] ?></td>
      <td><?= $row['registered_at'] ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
