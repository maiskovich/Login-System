<?
/**
 * Controller for handling errors of any module
 */
class Error extends Controller {
	function __construct(){
		parent::__construct();	
	}	
	/**
	 * Create error message showing the parameter $msg as the text of the error
	 * @param string $msg
	 */
	function index($msg){
		$this->view->title='404 Error';
		$this->view->msg=$msg;
		$this->view->render("header");	
		$this->view->render("error/index");
		$this->view->render("footer");
	}	
	
}	
?>