<?php

// caso tentem acessar o arquivo diretamente
if ($_SERVER["REQUEST_URI"] == "db.php") {
    header("Location: index.html");
}

//~ $servidor = "127.0.0.1";    // endereço do banco de dados
$servidor = "localhost";    // endereço do banco de dados
$usuario = "root";          // usuário do banco de dados
//~ $senha = "toor";            // senha do banco de dados
$senha = "";            // senha do banco de dados
//~ $meudb="yellowdino_db";     // nome do banco de dados
$meudb="yellowdino_db";     // nome do banco de dados

// Create connection
//~ $conn = mysqli_connect($servidor, $usuario, $senha, $meudb);
//~ $conn = mysqli_connect($servidor, $usuario, $senha);
//~ $conn = mysqli_connect('localhost', 'root', 'papel', 'yellowdino_db');

//~ pdo
try {
	$conn = new PDO("mysql:host=$servidor;dbname=$meudb", $usuario, $senha);
	//~ Exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Success";
} catch(PDOException $e) {
	echo "fail" . $e->getMessage();
}


//~ if ( mysqli_connect_errno() ) {
	//~ echo "fail" . mysqli_connect_error();
//~ }

//~ // Check connection
if (!$conn) {
    die("Não foi possível conectar ao banco de dados: " . mysqli_connect_error());
    //~ error_log(
    //~ "Não foi possível conectar ao banco de dados: ",
    //~ 3,
    //~ "/home/user01/error.log");
}

?>
