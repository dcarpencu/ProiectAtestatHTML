<html>
<body>

<?php
$servername = "192.168.0.4";
$username = "username";//se va trece user-ul personal
$password = "password";//se va trece parola personala
$dbname = "myDB";//numele bazei de date, la voi este acelasi ca user-ul

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Introduceti datele din formular in tabela elev
$sql = "INSERT INTO elev (nume, prenume) 
VALUES ('".$_POST["nume"]."', '".$_POST["prenume"]"')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//afisati toate datele existente in tabela elev
$sql = "SELECT * FROM elev";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " - Numele elevului: " . $row["prenume"]. " " . $row["nume"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>