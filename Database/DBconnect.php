<?php 
	interface DBconnect{
		public function getServer();
		public function getUser();
		public function getName();
		public function getConnection();
		public function setServer($serv);
		public function setUser($usr);
		public function setPass($pass);
		public function setName($name);//select
		public function connect();
		public function query($query);
		public function getError();
		public function affectedRows();
	}
?>
