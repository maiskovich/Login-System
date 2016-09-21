<?
/**
 * Clase controller del cual todos los controllers heredan
 */
class Controller {
	/**
	 * Metodo para construir objeto de la clase View
	 */
	function __construct() {
		$this -> view = new View();

	}
	/**
	 * Metodo para cargar el modelo asociado al controlador seleccionado
	 * @param string $name Name of the model
	 * @param string $modelPath location of the models
	 */
	public function loadModel($name,$modelPath = 'models/') {
		$path = $modelPath . $name . '_model.php';
		if (file_exists($path)) {
			require_once $modelPath . $name . '_model.php';
			$modelName = $name . '_Model';
			$this -> model = new $modelName;
		}
	}

}
?>