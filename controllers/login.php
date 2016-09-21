<?
class Login extends Controller{
	function __construct(){
		parent::__construct();	
	}
	/**
	 * Form for login in
	 */
	function index(){
		$this->view->title='Login';
		$this->view->render("login/index");
	}
	/**
	 * Log of succesful login attemps
	 */
	function loginLog(){
		Auth::handleLogin();
		$this->view->js=array('login/js/default.js');
		$this->view->title='Log';
		$this->view->loginsList = $this->model->loginLogList();;
		$this->view->render("header");
		$this->view->render("login/log");
		$this->view->render("footer");
	}
	/**
	 * Method for check login
	 */
	function run(){
		$this->model->run();	
	}	
	/**
	 * Method for login out
	 */
	function logout(){
		Session::init();	
		Session::destroy();	
		header('location:../login');
		exit;
	}	
}