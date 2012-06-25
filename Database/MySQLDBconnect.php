<?php 
	require_once 'DBconnect.php';
	class MySQLDB implements DBconnect{
		private $DB_SERVER;
		private $DB_USER;
		private $DB_PASS;
		private $DB_NAME;
		private $connection;
		public function getServer(){ return $this->DB_SERVER; }
		public function getUser(){ return $this->DB_USER; }
		public function getName(){ return $this->DB_NAME; }
		public function getConnection(){ return $this->connection; }
		public function setServer($serv = "localhost"){ $this->DB_SERVER = $serv; }
		public function setUser($usr){ $this->DB_USER = $usr; }
		public function setPass($pass){ $this->DB_PASS = $pass; }
		public function setName($name){ return mysql_select_db($name,$this->connection); }
		public function connect(){
			$this->connection = mysql_connect($this->DB_SERVER,$this->DB_USER,$this->DB_PASS);
			return $this->connection;
		}
		public function query($query){ return mysql_query($query); }
		public function getError(){ return mysql_error(); }
		public function affectedRows(){ return mysql_affected_rows($this->getConnection()); }
		public function lastQuery(){ return mysql_info($this->getConnection()); }
		public function insert($columns, $values, $table){ 
			$this->query("INSERT INTO " . $table . "(" . $columns . ") VALUES (" . $values . ")");
			return "INSERT INTO " . $table . "(" . $columns . ") VALUES (" . $values . ")";
		}
		public function prepArray($array){ return gzcompress(base64_encode(serialize($array))); }
		public function unprepArray($array){ return unserialize(base64_decode(gzuncompress($array))); }
		public function prep($query){ return mysql_real_escape_string($query, $this->connection); }
		public function findString($string, $field, $table){ 
			return $this->query("SELECT * FROM  " . $table . " WHERE " . 
								"" . $field . "" . " LIKE " . "'" . $string . "'");
		}
			public function findNum($num, $field, $table){ 
			return $this->query("SELECT * FROM  " . $table . " WHERE  " . 
								 $field . " = " . $num);
		}
		public function toArray($result){ return mysql_fetch_array($result); }
		public function hash($pass){ return sha1(sha1(md5($pass))); }
		public function numRows($queryResult){ return mysql_num_rows($queryResult); }
		public function getErrorNo(){ return mysql_errno(); }
	}

?>