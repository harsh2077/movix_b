<?php

// failed to implement and kept this for future use only 

// Include necessary files and database connection setup
require_once('includes/database.php');
 
$searchTerm = $_GET['term'];

// Perform a database query to retrieve matching results
$query = "SELECT DISTINCT movie_name FROM movies WHERE movie_name LIKE '%$searchTerm%'";
$result = $conn->query($query);

// Prepare an array to store the suggestions
$suggestions = array();

// Fetch results and add them to the array
while ($row = $result->fetch_assoc()) {
    $data['movie_name']  = $row['movie_name'];
    $data['id'] = $row['movie_id'];
    array_push($suggestions, $data);
}

// Return the suggestions as a JSON array
echo json_encode($suggestions);

// Close the database connection
$conn->close();
?>
<?php
// if ($result->num_rows > 0) {
//   $tutorialData = array(); 
//   while($row = $result->fetch_assoc()) {

//    $data['id']    = $row['id']; 
//    $data['value'] = $row['tutorial_name'];
//    array_push($tutorialData, $data);
// } 
// }
?>