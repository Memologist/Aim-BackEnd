<?php
    //$variablename = "ich bin der inhalt";
    //echo $variablename;

    //var_dump($_POST);



    if( isset($_POST['highScore']) && isset($_POST['userName']))
    {
        $highScore = $_POST['highScore'];
        $userName = $_POST['userName'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "aimdb";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
    
        $sql = "INSERT INTO tbl_users(Username, Score) 
        VALUES ('".$userName."',".$highScore.")";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        die("Values = Null");
    }

?>