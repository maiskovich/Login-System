<?
require_once ('controllers/error.php');
class DataCheck extends Model
	{
		public function __construct(){
		parent::__construct();
        }		   
		/**
		 * Method for checking if a value exist in db
		 * @param string $table
		 * @param string $field
		 * @param string $data
		 * @param string $errorfield
		 */
		public function checkRepeated($table,$field,$data,$errorfield)
		{
			$sth=$this->db->prepare("SELECT * FROM $table WHERE
	                        $field=:data");
	        $sth->execute(array(
	                           ':data'=>$data
	                           ));	
	        $exists=$sth->rowCount();
		   	//If there is already a registry with this conditions
		   	if($exists>0){
		    $error=new Error;
			$error->index('There is already a '.$errorfield.' with the value '.$data);
			exit;	
		   	}
		}	

	}		