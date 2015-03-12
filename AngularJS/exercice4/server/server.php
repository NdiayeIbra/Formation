<?php
	session_start();
	require("db.class.php");

	
	require("Teams.class.php");

	$db = new DB("08saronce", "mdp", "angularjs_formation");
	
	header('Content-Type: application/json');
	header('HTTP/1.0 200 Ok');

	function get($name) {
		return isset($_GET[$name]) ? $_GET[$name] : null;
	}

	function post($name) {
		return isset($_POST[$name]) ? $_POST[$name] : null;
	}

	if (empty($_POST)) {
		$_request_body = file_get_contents('php://input');
		$_request_data = json_decode($_request_body, true);
	}
	else {
		$_request_data = $_POST;
	}
	

	function request($name) {
		global $_request_data;
		return isset($_request_data[$name]) ? $_request_data[$name] : null;
	}

	function error($name, $code = null) {
		echo json_encode(array("error"	=> $name, "code" => $code));
		exit();
	}


	$get = get("m");
	$type_method = "get";


	$method = $_SERVER['REQUEST_METHOD'];

	switch ($method) {
	  case 'PUT':
	    $type_method = "put";
	    break;
	  case 'POST':
	    $type_method = "post";
	    break;
	  case 'GET':
	    $type_method = "get";  
	    break;
	  case 'DELETE':
	    $type_method = "delete";  
	    break;
	  default:
	    error("method does not exist");
	    break;
	}


	
	switch ($get) {
		case "teams":
			$obj = new Teams($db);
			call_user_func_array(array($obj, $type_method), array(get("id")));
		break;
		default:
			error("what is API called ?");
	}

	
?>
