<?php
session_start();
include 'connect.php';

// Sanitize and validate input
function cleanInput($data) {
  return htmlspecialchars(strip_tags(trim($data)));
}

// Check if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = cleanInput($_POST["name"]);
  $student_id = cleanInput($_POST["student_id"]);
  $email = cleanInput($_POST["email"]);
  $language = cleanInput($_POST["language"]);

  // Basic empty check (in case JS validation is bypassed)
  if (empty($name) || empty($student_id) || empty($email) || empty($language)) {
    die("All fields are required.");
  }

  // Check if Student ID already exists
  $checkStmt = $conn->prepare("SELECT * FROM students WHERE student_id = ?");
  $checkStmt->bind_param("s", $student_id);
  $checkStmt->execute();
  $result = $checkStmt->get_result();

  if ($result->num_rows > 0) {
    die("Student ID already registered.");
  }

  // Prepare and bind insert query
  $stmt = $conn->prepare("INSERT INTO students (student_id, name, email, language_preference) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $student_id, $name, $email, $language);

  if ($stmt->execute()) {
    $_SESSION['student_id'] = $student_id;  // Start session
    header("Location: ../view_students.php");
    exit();
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $checkStmt->close();
  $conn->close();
} else {
  echo "Invalid request.";
}
?>
