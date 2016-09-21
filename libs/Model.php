<?
/**
 * Clase model para crear un objeto Database
 */
class Model{
	/**
	 * Crea un objeto del tipo database y se lo asigna a $this->db
	 */
	function __construct(){
	 $this->db=new Database(DB_TYPE,DB_HOST,DB_NAME,DB_USER,DB_PASS);
	}
}