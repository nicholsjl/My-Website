<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		if ($this->input->method(true) == 'POST' && $this->input->is_ajax_request()) {
			$json = array();
			$bot_trapped = false;

	    // first_name: time trap - should not be less than 15 seconds from current time
	    // last_name: honeypot - should not be set at all
	    if (!empty($_POST['last_name'])) {
	      $bot_trapped = true;
	    } elseif (!empty($_POST['first_name'])) {
	      $decrypted_time = encrypt_decrypt($_POST['first_name'], 'd');
	      $elapsed = time() - $decrypted_time;
	       if (!is_numeric($decrypted_time) || $elapsed < 15) {
	        $bot_trapped = true;
	      }
	    }

	    if ($bot_trapped) {
	      $json = array('type' => 'danger', 'message' => 'You appear to be a robot.');
	    } else {
				$errors = $this->validate_form();

				if (empty($errors)) {
					$json = array('type' => 'success', 'message' => "Message received! Thanks for reaching out. I'll be in touch very soon.");

					$message = array(
						'subject' => $this->input->post('subject'),
						'email' => strtolower($this->input->post('email')),
						'message' => $this->input->post('message'),
					);

					$template = $this->load->view('emails/contact', $message, true);
					$this->load->library('email');
					$this->email->from('mail@jodinichols.work', 'Jodi Nichols');
					$this->email->to(CONTACT_RECIPIENTS);
					$this->email->set_mailtype('html');
					$this->email->subject($message['subject']);
					$this->email->message($template);
					$result = $this->email->send();
				} else {
					$json = array('type' => 'danger', 'message' => $errors);
				}
			}

			echo json_encode($json);
			die;
		}

		$data['homepage'] = true;
		$data['title'] = 'Jodi Nichols\' Portfolio';
		$data['view_content'] = $this->load->view('home/index', '', true);
		$this->load->view('shared/_layout', $data);
	}

	private function validate_form() {
		$this->form_validation->set_rules('email', 'Email address', 'htmlspecialchars|trim|required|max_length[255]|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'htmlspecialchars|trim|required|max_length[50]');
		$this->form_validation->set_rules('message', 'Message', 'htmlspecialchars|trim|required|max_length[2000]');
		$this->form_validation->run();
		return validation_errors();
	}

}
