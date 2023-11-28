<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// controllers/Web/Auth.php

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url'); 
        $this->load->model('User_model');
        $this->load->model('Coinmaster_model');
        $this->load->library('jwt');
        $this->load->library('authorization_token');
    }

    public function index() {
        // Load login view
        $this->load->view('login');
    }

    public function login() {
       
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Validate login credentials - you should perform proper validation and authentication

        if ($this->User_model->verify_user($username, $password)) {
            $token_data = array(
                'username' => $username,
                'exp' => time() + 3600, // Token expiration time (1 hour)
            );

            $jwt_token = JWT::encode($token_data, '1234567890qwertyuiopmnbvcxzasdfghjkl'); // Replace 'your_secret_key' with your actual secret key

            // Return response with JWT token
            $response = array(
                'status' => true,
                'message' => 'Login successful',
                'token' => $jwt_token,
            );
            // Redirect to the Coin Listing Page on successful login
            redirect('auth/listing');
        } else {
            // Return response for failed login
            $response = array(
                'status' => false,
                'message' => 'Invalid username or password',
            );
            // Redirect back to the login page with an error message
            redirect('auth');
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }
    public function listing() {
        // Load necessary data and pass it to the view

        // Example data, replace this with your actual data fetching logic
        $data['coins'] = $this->Coinmaster_model->getCoins();

        $this->load->view('coin_listing', $data);
    }
    // REST API endpoint for updating coin name
    public function update_coin_name() {
        // Verify and decode the JWT token
        $token = $this->authorization_token->validateToken();

        if (!$token) {
            // Token validation failed
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Unauthorized']));
            return;
        }

        // Token is valid, continue with the update logic
        $coin_id = $this->input->post('coin_id');
        $new_name = $this->input->post('new_name');

        // Validate input parameters
        if (empty($coin_id) || empty($new_name)) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Invalid input parameters']));
            return;
        }

        // Update coin name in the database
        $result = $this->Coinmaster_model->update_coin_name($coin_id, $new_name);

        if ($result) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'message' => 'Coin name updated successfully']));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Failed to update coin name']));
        }
    }
}

