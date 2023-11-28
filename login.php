<?php
// Include the code from database.php
require_once('includes/database.php');

$username = '';
$password = '';
$login_status = 2;

if (isset($_POST['username'])) {
    $username = trim($_POST['username']);
}

if (isset($_POST['password'])) {
    $password = trim($_POST['password']);
}

if (!empty($username)) {
    // The SQL select statement
    $query_str = "SELECT * FROM users WHERE user_name='$username' AND user_password='$password'";

    // Execute the query
    $result = @$conn->query($query_str);

    if ($result->num_rows) {
        // It is a valid user. Need to store the user in Session Variables
        session_start();
        $_SESSION['login'] = $username;
        
        $result_row = $result->fetch_assoc();
        $_SESSION['role'] = $result_row['user_role'];
        $_SESSION['name'] = $result_row['user_full_name'];
        $_SESSION['id'] = $result_row['user_id'];
        $_SESSION['email'] =$result_row['user_email']; // adding it here so to get properly 
        // echo $_SESSION['id'];
        $_SESSION['profilePicturePath'] =$result_row['profilePicturePath'];
        echo $_SESSION['email'];
        // Update the login status
        $login_status = 1;
    }
}

header("Location: loginform.php?ls=$login_status");
$conn->close();
?>
