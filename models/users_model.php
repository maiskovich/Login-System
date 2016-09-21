<?
class Users_Model extends Model {

	public function __construct() {
		parent::__construct();
	}
	/**
	 * List users in users table
	 */
	public function usersList() {
		return $this->db->select('SELECT * FROM users');
	}
	/**
	 * Create an user
	 * @param array $data
	 */
	public function create($data) {
		$this -> db -> insert('users', array('firstname' => $data['firstname'],
											'lastname' => $data['lastname'],
											'phone' => $data['phone'],
											'email' => $data['email'],
											'password' => $data['password']));
	}

}
?>