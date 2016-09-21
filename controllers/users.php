<?
class Users extends Controller{
	function __construct(){
		parent::__construct();
	}
	/**
	 * Show a list of users
	 */
	function index(){
		Auth::handleLogin();
		$this->view->js=array('users/js/default.js');
		$this->view->title='Users';
		$this->view->usersList = $this->model->usersList();
		$this->view->render("header");
		$this->view->render("users/index");
		$this->view->render("footer");
	}
	/**
	 * Form for adding a new user
	 */
	public function signup(){
		$this->view->js=array('usuarios/js/default.js');		
		$this->view->title='Sign Up';
		$this->view->render("header");
		$this->view->render('users/signup');
		$this->view->render("footer");
	}
	/**
	 * Create user
	 */
	public function create(){

		$data=array();	
		$data['firstname']=$_POST['firstname'];
		$data['lastname']=$_POST['lastname'];
		$data['phone']=($_POST['phone']) ? $_POST['phone'] : 0;
		$data['email']=$_POST['email'];
		$data['password']=md5($_POST['password']);

		//Error checking
		$dataCheck=new DataCheck;
		$dataCheck->checkRepeated('users','email',$data['email'],'email address');
		
		$this->model->create($data);

		header('location:'.URL. 'login');
		
	}

}