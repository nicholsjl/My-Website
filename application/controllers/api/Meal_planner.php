<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meal_planner extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('meal_planner_model', 'meals', true);
    }

    public function reset_database() {
        if (php_sapi_name() == 'cli') {
            if (file_exists(DB_FILE_MEAL_PLANNER)) {
                $this->load->dbforge();

                if ($this->dbforge->drop_database(DB_NAME)) {
                    echo 'Database deleted'.PHP_EOL;
                }

                if ($this->dbforge->create_database(DB_NAME)) {
                    echo 'Database created'.PHP_EOL;

                    // Connect to database
                    $this->db = $this->load->database('default', true);

                    // Rebuild tables using SQL backup
                    $tmp = '';
                    $lines = file(DB_FILE_MEAL_PLANNER);

                    foreach ($lines as $line) {
                        // Skip it if it's a comment
                        if (substr($line, 0, 2) == '--' || $line == '') {
                            continue;
                        }

                        // Add this line to the current segment
                        $tmp .= $line;

                        // If it has a semicolon at the end, it's the end of the query
                        if (substr(trim($line), -1, 1) == ';') {
                            // Perform the query
                            $this->db->simple_query($tmp);

                            // Reset temp variable to empty
                            $tmp = '';
                        }
                    }
                }

                // Close database connection
                $this->db->close();
            } else {
                echo 'SQL file does not exist'.PHP_EOL;
                die();
            }
        }
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
            ->set_header('Access-Control-Allow-Origin: '.base_url())
            ->set_header('Access-Control-Request-Method: GET, POST, PUT, DELETE, OPTIONS')
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }

}