<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CoinCron extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load required models
        $this->load->model('Coinmaster_model');
    }

    public function update_coins() {
        // Fetch data from Coinpaprika API
        $coinpaprika_url = "https://api.coinpaprika.com/v1/coins";
        $coins_data = file_get_contents($coinpaprika_url);
        $coins = json_decode($coins_data, true);

        if (!empty($coins)) {
            // Update the coinmaster table
            $this->Coinmaster_model->update_coins($coins);
            echo 'Coins updated successfully.';
        } else {
            echo 'Unable to fetch data from Coinpaprika API.';
        }
    }

}
