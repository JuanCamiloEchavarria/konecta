<html>
<body>

<form action = "<?php $_PHP_SELF ?>" method = "GET">
    ID:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type = "number" name = "ID" min=0 maxlength=20 step= "0.01"/><br />
    Nombre:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type = "text" name = "Nombre" min=0 maxlength=20 step="0.01"/><br />
    Referencia:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type = "number" name = "Referencia" min=0 maxlength=20 step= "0.01"/><br />
    Precio:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type = "number" name = "Precio" min=0 maxlength=20 step="0.01"/><br />
    Peso:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type = "number" name = "Peso" min=0 maxlength=20 step= "0.01"/><br />
    Categoria:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type = "text" name = "Categoria" min=0 maxlength=20 step="0.01"/><br />
    Stock:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type = "number" name = "Stock" min=0 maxlength=20 step= "0.01"/><br />
    Fecha:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type = "date" name = "Fecha" min=0 maxlength=20 step="0.01"/><br />
    <input type = "submit" />
</form>

</body>
</html>

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


if((isset( $_GET["ID"]) != "") && (isset( $_GET["Nombre"]) != "") && (isset( $_GET["Referencia"]) != "") && (isset( $_GET["Precio"]) != "")
    && (isset( $_GET["Peso"]) != "") && (isset( $_GET["Categoria"]) != "") && (isset( $_GET["Stock"]) != "") && (isset( $_GET["Fecha"]) != "")) {
    if((strlen($_GET["ID"])==0) || (strlen($_GET["Nombre"])==0) || (strlen($_GET["Referencia"])==0) || (strlen($_GET["Precio"])==0)
        || (strlen($_GET["Peso"])==0) || (strlen($_GET["Categoria"])==0) || (strlen($_GET["Stock"])==0) || (strlen($_GET["Fecha"])==0)){
        
        echo "Debe ingresar todos los campos<br />";
    }

    else{
        $ID = $_GET["ID"];
        $Nombre = $_GET["Nombre"];      
        $Referencia= $_GET["Referencia"];
        $Precio= $_GET["Precio"];
        $Peso= $_GET["Peso"];
        $Categoria= $_GET["Categoria"];
        $Stock= $_GET["Stock"];
        $Fecha= $_GET["Fecha"];

        
        $sql = "INSERT INTO `".$tablename."` SET `ID` = '".$ID."', `Nombre` = '".$Nombre."', `Referencia` = '".$Referencia."', `Precio` = '".$Precio."',
            `Peso` = '".$Peso."', `Categoria` = '".$Categoria."', `Stock` = '".$Stock."', `Fecha` = '".$Fecha."'";
        if ($conn->query($sql) === TRUE) {
            echo "DB response --> Changes made successfully<br />";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    }

    exit();


}

?>
