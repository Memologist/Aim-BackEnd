<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "aimdb";
  
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$highscores = array();

$sql = "SELECT UserID, Username, Score FROM tbl_users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($highscores, $row);
    }
    echo json_encode($highscores);
} else {
    echo json_encode(array('errorMessage' => "0 results"));
}
?>