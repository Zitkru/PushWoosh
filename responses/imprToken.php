<?php
//Conexión a BD

define("server", "localhost");
define("user", 'tuquinie_pushw');
define("pass", 'Pushwoosh#1');
define("mainDB", 'tuquinie_pushwoosh');
//$mysqli=new mysqli(server,user,pass,mainDB);
$errorDB=false;
//Variable de status en conexión
if(defined('server') && defined('user') && defined('pass') && defined('mainDB')){
	//Conexión con BD
	$mysqli = new mysqli("localhost","tuquinie_pushw","Pushwoosh#1","tuquinie_pushwoosh");

	//Verificar error al conectar
	if(mysqli_connect_error()){
		$errorDB = true;
		echo "error";
	}

}
	if(isset($_GET['tablaT'])){
		$db2 = ("SELECT tokenstring FROM tokens");
		$i = 0;
		$tmp = array();
	
		$result = $mysqli->query($db2);
	   
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		
			$tmp[$i] = $row;
			$i++;
			
	
		}
		
				
	}
	
	if (isset($_REQUEST['callback'])) {
		header('Content-Type: text/javascript');
		echo $_REQUEST['callback'] . '(' . json_encode($tmp) . ');';
	} else {
		header('Content-Type: application/x-json');
		echo json_encode($tmp);
	}
?>
