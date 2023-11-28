<?php
class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
    }
    public function verify_user($username, $password) {
        // Validate user credentials against the database
        $this->db->where('username', $username);
        $this->db->where('password', $password); // Hash the password before comparing

        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            // User credentials are valid
            return $query->row();
        } else {
            // User credentials are not valid
            return false;
        }
    }
}

?>
