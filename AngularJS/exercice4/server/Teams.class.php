<?php
	class Teams {

		private $db;

		function __construct($db) {
			$this->db = $db;

		}

		public function get($id = null, $ret = false) {

			if (isset($id)) {
				$result = $this ->db
								->select("tabs")
								->where(array(
									"id"	=>	$id
								))
								->fetchAll();
			}
			else {
				$result = $this->db->select("tabs")->fetchAll();
			}
			

			echo json_encode($result);
			
		}

		

		public function post($id = null) {

			$url_post = request("url");
			$url = "http://" . $url_post;
			$name = request("name");


			if (!isset($name)) {
				error("name is empty", "name");
			    return false;
			}

			$_data = array("content", "name");

			$set = array();
			for ($i=0 ; $i < count($_data) ; $i++) {
				$attr = $_data[$i];
				$request = request($attr);
				if (isset($request)) {
					$set[$attr] = $request;
				}
				
			}

			if (!isset($id)) {
				$result = 	$this->db 	->insert("tabs")
										->values($set)
										->exec();
			}
			else {
				$result = 	$this->db 	->update("tabs")
										->set($set)
										->where(array(
											"id"	=>	$id
										))
										->exec();
			}
			
			echo json_encode($result);

				
		}

		public function delete($id) {

			$query = 	$this->db 	->delete("tabs")
									->where(array(
										"id"			=>	$id
									))
									->exec();

			echo json_encode($query);
			

		}

	}
?>