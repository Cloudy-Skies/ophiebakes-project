<?php
//database

//database credentials
require('db_cred.php');


class db_connection
{
	//properties
	public $db = null;
	public $result = null;

	//connect
	/**
	*Database connection
	*@return boolean
	**/
	function db_connect(){
		
		//connection
		$this->db = mysqli_connect(SERVER,USERNAME,PASSWORD,DATABASE);
		
		//test the connection
		if (mysqli_connect_errno()) {
			return false;
		}else{
			return true;
		}
	}

	//execute a query
	/**
	*Query the Database
	*@param $sqlQuery
	*@return boolean
	**/
	function query($sqlQuery){
		
		if (!$this->db_connect()) {
			return false;
		} 
		elseif ($this->db==null) {
			return false;
		}

		//run query 
		$this->result = mysqli_query($this->db,$sqlQuery);
		
		if ($this->result == false) {
			return false;
		}else{
			return true;
		}
	}

	//execute a query with mysqli real escape string
	//to saveguard from sql injection
	/**
	*Query the Database
	*@param $sqlQuery
	*@return boolean
	**/
	function query_escape_string($sqlQuery){
		
		//run query 
		$this->result = mysqli_query($this->db,$sqlQuery);
		
		if ($this->result == false) {
			return false;
		}else{
			return true;
		}
	}

	//fetch a data
	
	function db_fetch_one($query){
		
		// if query executes successfully
		if ($this->query($query)) {
			// return one row
			return mysqli_fetch_assoc($this->result);
		}
		// else return false
		return false;
	}

	//fetch all data
	/**
	*get select data
	*@return mixed
	**/
	function db_fetch_all($sql){
		
		// if executing query returns false
		if(!$this->query($sql)){
			return false;
		} 
		//return all record
		return mysqli_fetch_all($this->result, MYSQLI_ASSOC);
	}


	//count data
	/**
	*get select data
	*@return 
	**/
	function db_count(){
		
		//check if result was set
		if ($this->result == null) {
			return false;
		}
		elseif ($this->result == false) {
			return false;
		}
		
		//return a record
		return mysqli_num_rows($this->result);

	}
	
}