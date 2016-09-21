<?
/**
 * Clase para comprobación de valores en array
 */
class ArrayFunctions
{
	/**
	 * Clase para comprobar si un valor existe en un array
	 * @param string $array The array to check
	 * @param string $key in wich key we want the value
	 * @param string $val the value
	 */
	public static function valInKey($array, $key, $val) {
    foreach ($array as $item)
        if (isset($item[$key]) && $item[$key] == $val)
            return true;
    return false;
	}
}
?>	