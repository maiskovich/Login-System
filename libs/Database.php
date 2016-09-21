<?
/**
 * Clase para el manejo de la base de datos
 */
class Database extends PDO
{
	/**
	 * Creamos una conexión con la DB
	 * @param string $DB_TYPE
	 * @param string $DB_HOST
	 * @param string $DB_NAME
	 * @param string $DB_USER
	 * @param string $DB_PASS
	 */
	public function __construct($DB_TYPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASS){
		parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME.';charset=UTF8',$DB_USER, $DB_PASS,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	
		/*parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTIONS);		*/	
	}
	/**
	 * Metodo para hacer un select
	 * @param string $sql an Sql string
	 * @param array $array Parameters to bind
	 * @param constant $fetchMode a PDO fetch mode
	 * @return mixed
	 */
	public function select($sql,$array=array(),$fetchMode= PDO::FETCH_ASSOC)
	{
		$sth=$this->prepare($sql);
		foreach($array as $key=>$value){
			$sth->bindValue("$key",$value);	
		}		
		$sth->execute();
		return $sth->fetchAll($fetchMode);
		
	}	
	

	/**
	 * Metodo para hacer un insert
	 * @param string $table a name of table
	 * @param string $data An associative array
	 * 
	 */
	public function insert($table,$data){
		ksort($data);

		$fieldName=implode('`,`',array_keys($data));
		$fieldValues=':' . implode(', :',array_keys($data));


		$sth=$this->prepare("INSERT INTO $table(`$fieldName`) VALUES ($fieldValues)");


		foreach($data as $key=>$value){
			$sth->bindValue(":$key",$value);
		}
	    return $sth->execute();
			
		}
	
	/**
	 * Metodo para hacer un update
	 * @param string $table a name of table
	 * @param string $data An associative array
	 * @param string $where the WHERE query part
	 */
	public function update($table,$data,$where){
		ksort($data);
		$fieldDetails=NULL;
		foreach($data as $key=>$value){
			$fieldDetails .="`$key`=:$key,";
		}		
		$fieldDetails=rtrim($fieldDetails,',');
	
		$sth=$this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
		
		foreach($data as $key=>$value){
			$sth->bindValue(":$key",$value);
		}	
	    
	    return $sth->execute();
			
		}
	/**
	 * Metodo para la eliminación de un dato
	 * @param string $table
	 * @param string $where
	 * @param integer $limit
	 * @return integer Affected row
	 * 
	 */
	public function delete($table,$where,$limit=1){
		return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
	}	
	/**
	 * Metodo para la eliminación de multiples datos, sin limite
	 * @param string $table
	 * @param string $where
	 * @return integer Affected row
	 * 
	 */
	public function deleteNoLimit($table,$where){
		return $this->exec("DELETE FROM $table WHERE $where");
	}	
	/**
	 * Metodo para devolver los nombres de todas las columnas en una tabla
	 */
	public function getColumnNames($table){
    $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '".DB_NAME."' AND table_name = :table";
    try {
        $stmt=$this->prepare($sql);
        $stmt->bindValue(':table', $table, PDO::PARAM_STR);
        $stmt->execute();
        $output = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $output[] = $row['COLUMN_NAME'];                
        }
        return $output; 
    }

    catch(PDOException $pe) {
        trigger_error('Could not connect to MySQL database. ' . $pe->getMessage() , E_USER_ERROR);
    }
}
	
}					
	

?>