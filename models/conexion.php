<?php namespace models;
	
	class conexion{
		private $serverName = "sql.grupoaleastur.com";
		private $connectionInfo = array (
			"database" => "EntryControl",
			"userdb" => "adminEC",
			"passdb" => "alea9038"
		);
		private $options = array("Scrollable" => SQLSRV_CURSOR_STATIC);

		private $connection;

		public function __construct(){
			$this->connection = sqlsrv_connect($this->serverName, $this->connectionInfo);
		}

		public function consultaSimple($sql){
			sqlsrv_query($this->connection, $sql, $this->options);
		}

		public function consultaRetorno($sql){
			$query = sqlsrv_query($this->connection, $sql, $this->options);
			return $query;
		}

	}

?>