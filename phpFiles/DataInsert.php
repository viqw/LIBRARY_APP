<?php

$username = filter_input(INPUT_POST, 'Username');
$password = filter_input(INPUT_POST, 'password');
$rpassword = filter_input(INPUT_POST, 're-password');
if (!empty($username)) {
    if (!empty($password)) {
        if (!empty($rpassword)) {
          $host = "localhost";
          $dbusername ="root";
          $dbpassword = "";
          $dbname = "library";
          $port="5500";


          // Create connection
          $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);

          if(mysqli_connect_error()){
              die('Connect Error ('.mysqli_connect_error() .') '
                . mysqli_connect_error());
          }
          else{
              $sql = "INSERT INTO studentsignup (username, password, re-password)
              values ('$username','$password','$rpassword')";
              if($conn->query($sql)){
                  echo "Record Inserted";
              }
              else{
                  echo "Error: ".$sql."<br>".$conn->error;
              }
           $conn->close();
          }
        }
        else {
            echo "Re-Password should not be empty";
            die();
        }

    }
    else {
        echo "Password should not be empty";
        die();
    }
}
else {
    echo "Username should not be empty";
    die();
}
?>