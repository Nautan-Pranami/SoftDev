<?php
include 'php/session_check.php';
include 'php/connect.php';

// Fetch students
$sql = "SELECT * FROM students ORDER BY enrollment_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Enrolled Students | SoftDev</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top mb-5">
  <div class="container">
    <a class="navbar-brand fw-bold text-primary" href="index.html">SoftDev</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="register.html">Register</a></li>
        <li class="nav-item"><a class="nav-link active" href="#">Enrolled Students</a></li>
        <li class="nav-item"><a class="nav-link logout-btn" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container table-container mt-5">
  <h3 class="text-center mb-4">Enrolled Students</h3>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Student ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Language</th>
        <th>Enrolled On</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['student_id']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['language_preference']) ?></td>
            <td><?= $row['enrollment_date'] ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="6" class="text-center">No students enrolled yet.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
