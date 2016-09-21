<?

require_once ('controllers/error.php');
/**
 * Class for managing authentication
 * 
 */
class Auth
	{
		/**
		 * Check if the user is logged in
		 */	
		public static function handleLogin()
		{
			@session_start();
			$logged=$_SESSION['loggedIn'];
			$redirectPage=$_SERVER['REQUEST_URI'];
			if($logged==false){
				session_destroy();
				session_start();
				Session::set('redirectPage',$redirectPage);
				 echo '<script type="text/javascript">';
		        echo 'window.location.href="'.$URL.'/login";';
		        echo '</script>';
		        echo '<noscript>';
		        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
		        echo '</noscript>'; 
				exit;	
			}		
			if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3600)) {
			    // last request was more than 60 minutes ago
			   session_destroy();
				session_start();
			    Session::set('redirectPage',$redirectPage);
			    echo '<script type="text/javascript">';
		        echo 'window.location.href="'.$URL.'/login";';
		        echo '</script>';
		        echo '<noscript>';
		        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
		        echo '</noscript>'; 
				exit;	
			}
			$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
			
		}
	}		