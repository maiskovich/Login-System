<?
/**
 * Clase para el manejo de sesiones
 */
class Session
{	
	/**
	 * Iniciar una sesión
	 */	
	public static function init()
	{
		@session_start();
	}	
	/**
	 * Asignar un valor a un key en una sesión
	 */
	public static function set($key, $value)
	{
		$_SESSION[$key]=$value;
	}
	/**
	 * Obtener valor de un key de una sesión
	 */
	public static function get($key)
	{
		if(isset($_SESSION[$key]))	
		return $_SESSION[$key];	
	}		
	/**
	 * Destruir una sesión
	 */
	public static function destroy()
	{
		//unset($_SESSION);	
		session_destroy();
	}	
}

?>