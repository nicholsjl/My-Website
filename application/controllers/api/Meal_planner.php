<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meal_planner extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('meal_planner_model', 'meals', true);
    }

    public function fetch_meals() {
        $this->requireMethod('get');
        $results = $this->meals->select_all();
        $this->json($results);
    }

    public function save_meal() {
        $this->requireMethod('post');

        if ($this->input->post('name') != null) {
            $data = array(
                'name' => $this->input->post('name'),
                'duration' => $this->input->post('duration'),
                'winter' => !empty($this->input->post('winter')) ? 1 : 0,
            );

            $id = $this->meals->insert($data);
            $data['id'] = $id;
            $this->json($data);
        } else {
            $this->forbidden();
        }
    }

    private function requireMethod($method) {
        $method = strtoupper($method);

        if ($this->input->method(true) != $method) {
            $this->forbidden();
        }

        if ($method == 'POST') {
            $_POST = json_decode(file_get_contents('php://input'), true);
        }
    }

    private function forbidden() {
        http_response_code(403);
        die;
    }

    private function json($response) {
        $this->output
            ->set_header('Access-Control-Allow-Origin: *')
            ->set_header('Access-Control-Request-Method: GET, POST, PUT, DELETE, OPTIONS')
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }

}