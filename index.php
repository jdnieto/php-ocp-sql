<h1>Hello World! Jenkins Code 1</h1>
 <?php
// $servername = getenv('MYSQL_SERVICE_HOST');
$servername = 'mysql.mysql-david-test.svc.cluster.local'
$serverport = getenv('MYSQL_SERVICE_PORT');
$username = getenv('mysqluser');
$password = getenv('mysqlpassword');
$dbname = getenv('mysqldatabase');

// Create connection
$conn = new mysqli($servername.':'.$serverport, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, nombre FROM asistentes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	echo "<table border='1'>
              <tr>
	      <th>Id</th>
	      <th>Nombre</th>
              </tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr>";
	echo "<td>" . $row["id"] . "</td>";
	echo "<td>" . $row["nombre"]. "</td>";
	echo "</tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
