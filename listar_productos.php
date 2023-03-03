<?php
    //database
$servername = "localhost:3306";
$username = "milo";
$password = "1234";
$dbname = "konecta";
$tablename = "inventario";

$ID="";
$Nombre="";
$Referencia="";
$Precio="";
$Peso="";
$Categoria="";
$Stock="";
$Fecha="";

    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
if ($conn->connect_error) {
    $result['error']='true';
    echo json_encode($result);
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT `ID`,`Nombre`,`Referencia`,`Precio`,`Peso`,`Categoria`,`Stock`,`Fecha` FROM `inventario` WHERE 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border = '2'>";
    echo "<tr><td>".'ID'."</td><td>".'Nombre'."</td><td>".'Referencia'."</td><td>".'Precio'."</td><td>".'Peso'."</td><td>".'Categoria'."</td><td>".'Stock'."</td><td>".'Fecha'."</td></tr>";
    while($row = $result->fetch_assoc()) {
        $ID   = $row['ID'];
        $Nombre = $row['Nombre'];
        $Referencia = $row['Referencia'];
        $Precio   = $row['Precio'];
        $Peso   = $row['Peso'];
        $Categoria   = $row['Categoria'];
        $Stock = $row['Stock'];
        $Fecha = $row['Fecha'];
        echo "<tr><td>".$ID."</td><td>".$Nombre."</td><td>".$Referencia."</td><td>".$Precio."</td><td>".$Peso."</td><td>".$Categoria."</td><td>".$Stock."</td><td>".$Fecha."</td></tr>";       
    }
    echo "</table>";
} else {
    echo "Empty";
}

$conn->close();


?>
