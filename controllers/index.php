<?
class Index extends Controller{
	function __construct(){
		parent::__construct();	
		Auth::handleLogin();	
	}
	/**
	 * Main page
	 */
	function index(){
		$this->view->title='Presupuestos';
		$this->view->render("header");
		$this->view->render("index/index");
		$this->view->render("footer");
	}	
}