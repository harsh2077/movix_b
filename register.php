<?php
// Start a new session
session_start();
// fix user id here so it can be used in user account and login page and header page as well 
$page_title = "Register New Account";

require_once 'includes/header.php';
require_once 'includes/database.php';

$user_name = $_GET['username'];
$full_name = $_GET['name'];
$user_email = $_GET['email'];
$password = $_GET['password'];
$role = 2;
$profilePicturePath = $_GET['profile_image'];

// Assuming that you want to store the selected image path in the session
$_SESSION['profilePicturePath'] = $profilePicturePath;

// Check if the user already exists
$query_str = "SELECT * FROM users WHERE user_name='$user_name' && user_password='$password'";
$result = @$conn->query($query_str);

if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Insertion failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}

// if the user does not exist and is empty 
if ($result->num_rows == 0) { 
    $query_stry = "INSERT INTO users (`user_name`, `user_full_name`, `user_email`, `user_password`, `user_role`, `profilePicturePath`) VALUES ('$user_name', '$full_name', '$user_email', '$password', '$role', '$profilePicturePath')";// user id is still null by this 
$result = '';

if ($conn->query($query_stry) === TRUE) {
    echo "Record inserted successfully"; 
} else {
    echo "Error: " . $query_stry . "<br>" . $conn->error;
} 
    $new_result = @$conn->query("SELECT * FROM users WHERE user_name='$user_name' && user_password='$password'");
     
    $_SESSION['login'] = $user_name;
    $_SESSION['email'] =$user_email; // added here 
    $result_row = $new_result->fetch_assoc();
    $_SESSION['role'] = $role;
    $_SESSION['name'] = $full_name;
    $_SESSION['id'] = $result_row['user_id'];  

    // Update the login status
    $login_status = 3;
    
    // Redirect to useraccount.php after registration
    // header("Refresh:3; url=useraccount.php", true, 303);
    ?>
    <div class="container wrapper">
        <h1 class="text-center text-success">You have successfully registered! 
     
        </h1>
    </div>
<?php } else { ?>
    <div class="container wrapper">
        <h1 class="text-center text-danger">This username is already registered!</h1>
    </div>
 
<?php
    // Redirect to registration.php after unsuccessful registration
    // header("Refresh:3; url=registration.php", true, 303);
}

include 'includes/footer.php';
?>
