<?php
include ("db_connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = trim ($_POST['username']);
  $email = trim ($_POST['email']);
  $password = trim ($_POST['password']);
  $confirm_password = $_POST['confirm_password'];
  /*if(empty($username) || empty($email) || empty($password)){
    echo "<h2> All fields required. </h2>";
  } else {
    $stmt = $conn ->prepare("INSERT INTO users(username, email, password)VALUES(?,?,?)");
    $stmt ->bind_param("sss", $username, $email, $password);

    if($stmt -> execute()){
      echo "<h2> Account Registered Succesfully </h2>";
  } else {
    echo "Error: " .$stmt->error;
  }*/
  if ($password !== $confirm_password) {
    echo "Passwords do not match.";
    exit;
  }

  // Hash the password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Insert user into the database
  $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username, $email, $hashed_password);
  $stmt->execute();
  $stmt->close();

  // Redirect to login page
  header("Location: login.php");
  exit;
}
?>