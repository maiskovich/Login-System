<?
/**
 * Clase para el manejo de la vista
 */
class View {
	/**
	 * Construct
	 */	
	function __construct() {
	}
	/**
	 * Metodo para llamar al archivo vista
	 * @param string $name
	 * @param boolean $noInclude
	 */
	public function render($name, $noInclude = false) {
			require 'views/' . $name . '.php';
		} 

}
?>
