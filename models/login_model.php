<?
require_once ('controllers/error.php');
/**
 * Class for handling the login
 */
class Login_Model extends Model{
	public function __construct(){
		parent::__construct();
	}
	/**
	 * List succesful login attempts in loginlog table
	 */
	public function loginLogList() {
		return $this->db->select('SELECT * FROM loginlog
								 LEFT JOIN users ON loginlog.usersid=users.usersid ');
	}
	public function run(){
		$email = $_POST['email'];
   	    $password = md5($_POST['password']);

		$sth=$this->db->prepare("SELECT * FROM users WHERE
                        email= :email AND password=:password");
        $sth->execute(array(
                           ':email'=>$email,':password'=>$password
                           ));	
		$data=$sth->fetch();
        $user=$sth->rowCount();

	    if(!empty($_POST['password']) && !empty($_POST['email']) && $user>=1)   {
			 Session::init();
			 Session::set('email',$email);
			 Session::set('loggedIn' , true);
			$this -> db -> insert('loginlog', array('usersid' => $data['usersid'],
					'date' => date("Y-m-d H:i:s")));
			 header('location:..'. $_SESSION['redirectPage']);
		}else{
		 //Throw an error
		$error=new Error;
		$error->index('Incorrect email or password, press "LOGIN" button and try again');
		exit;
		}		
	}	

}	


?>