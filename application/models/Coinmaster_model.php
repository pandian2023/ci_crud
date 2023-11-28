<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coinmaster_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function update_coins($coins) {
        foreach ($coins as $coin) {
            // Check if the coin already exists in the coinmaster table
            $existing_coin = $this->db->get_where('coinmaster', array('id' => $coin['id']))->row_array();

            if (!empty($existing_coin)) {
                // Update existing coin
                $this->db->where('id', $coin['id']);
                $this->db->update('coinmaster', $coin);
            } else {
                // Insert new coin
                $this->db->insert('coinmaster', $coin);
            }
        }
    }
    public function getCoins() {
        // Assuming you have a table named 'coins', adjust accordingly
        $query = $this->db->get('coinmaster');

        // Return the result as an array
        return $query->result_array();
    }
    // Update coin name by ID
    public function update_coin_name($coin_id, $new_name) {
        $data = array('name' => $new_name);

        $this->db->where('coin_master_id', $coin_id);
        return $this->db->update('coinmaster', $data);
    }

}
