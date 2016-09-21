<?php
/**
 * Clase para dirigir la url al controller adecuado
 */
class Bootstrap {
	/**
	 * Propiedad donde guardar la URL
	 */	
    private $_url=null;
	/**
	 * Propiedad a la cual se le asigna el controlador indicado
	 */
	private $_controller=null;
	/**
	 * Ubicación de todos los controladores
	 */
	private $_controllerPath='controllers/'; //Always include trailing slash
	/**
	 * Ubicación de todos los modelos
	 */
	private $_modelPath='models/'; //Always include trailing slash
	/**
	 * Ubicación del archivo de error
	 */
	private $_errorFile='error.php';
	/**
	 * Ubicación del archivo por defecto
	 */
	private $_defaultFile='index.php';
	/**
	 * Starts the boostrap
	 * @return boolean
	 */ 
	public function init()
	{
		// Sets the protected $_url
		$this->_getUrl();
				
		//load the default controller if no url is set
		if (empty($this->_url[0])) {
			$this->_loadDefaultController();
			return false;
		}
		
		$this->_loadExistingController();
		$this->_callControllerMethod();
			
		
	}	
	/**
	 * (Optional)Set a custom path to controller
	 * @param string $path
	 */
	public function setControllerPath($path)
	{
		$this->_controllerPath=trim($path,'/') . '/';
	}
	/**
	 * (Optional)Set a custom path to models
	 * @param string $path
	 */
	public function setModelPath($path)
	{
		$this->_modelPath=trim($path,'/') . '/';
	}	
	/**
	 * (Optional)Set a custom path to error file
	 * @param string $path use the file name only of your controler, eg:error.php
	 */
	public function setErrorFile($path)
	{
		$this->_errorFile=trim($path,'/');
	}		
	
	/**
	 * (Optional)Set a custom path to error file
	 * @param string $path use the file name only of your controler, eg:index.php
	 */
	public function setDefaultFile($path)
	{
		$this->_defaultFile=trim($path,'/');
	}		
	
	/**
	 * Fetches the $_GET from 'url'
	 * 
	 */
	
	private function _getUrl()
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$this->_url = explode('/', $url);
	}	
	/**
	 * This load if there is no get parameter passed
	 * 
	 */
	private function _loadDefaultController(){
		require $this->_controllerPath . $this->_defaultFile;
		$this->_controller = new Index();
		$this->_controller->index();
	}
	/**
	 * Load an existing controller if the is a get parameter
	 * 
	 * @return boolean/string
	 * 
	 */
	
	private function _loadExistingController(){
		$file = $this->_controllerPath . $this->_url[0] . '.php';
		if (file_exists($file)) {
			require $file;
			$this->_controller = new $this->_url[0];
		    $this->_controller->loadModel($this->_url[0], $this->_modelPath);
		} else {
			$this->_error();
			return false;
		}		
	}	
	/**
	 * If a method is passed in the get url parameter
	 * 
	 * http://localhost/controller/method/(param)
	 * url[0]= Controller
	 * url[1]=Method
	 * url[2]=Param
	 * url[3]=Param
	 * url[4]=Param
	 */
	private function _callControllerMethod()
	{
		$length=count($this->_url);
		//Make sure the method we are calling exists
		if($length>1){
			if (!method_exists($this->_controller, $this->_url[1])) {
				$this->_error();
			}
		}	
		
		//Determine what to load
		switch($length){
			case 5:
				//Controoller->Method(param1,param2,param3)
				$this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3],$this->_url[4]);
				break;
			case 4:
				//Controoller->Method(param1,param2)
				$this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3]);
				break;
			case 3:
				//Controoller->Method(param1)
				$this->_controller->{$this->_url[1]}($this->_url[2]);
				break;
			case 2:
				//Controoller->Method()
				$this->_controller->{$this->_url[1]}();
				break;
			default:
				$this->_controller->index();
				break;				
			
		}		
		// calling methods
		
		
			
	}	
	
	/**
	 * Display an error page if nothing exists
	 * 
	 * @return boolean
	 */
	private function _error() {
		require $this->_controllerPath . $this->_errorFile;
		$this->_controller = new Error();
		$this->_controller->index('Esta página no existe');
		exit;
	}

}