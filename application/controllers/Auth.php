<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method!="POST"){
			$this->output->set_content_type('application/json');
			$this->output->set_status_header(400);
			$this->output->set_output(json_encode(array('status' => 400,'message' => 'Bad request.')));
		}else{

			$checkAuthClient = $this->M_auth->checkAuthClient();
			if($checkAuthClient == true){
				$params = json_decode(file_get_contents('php://input'), TRUE);
				$username = $params['username'];
				$password = $params['password'];
				$response = $this->M_auth->login($username,$password);
				
				$this->output
				->set_content_type('application/json')
				->set_status_header($response['status'])
				->set_output(json_encode($response));
			}
		}
	}

	public function logout()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method!="POST"){
			$this->output->set_content_type('application/json');
			$this->output->set_status_header(400);
			$this->output->set_output(json_encode(array('status' => 400,'message' => 'Bad request.')));
		}else{
			$checkAuthClient = $this->M_auth->checkAuthClient();
			if($checkAuthClient == true){
				$response = $this->M_auth->logout();
				$this->output
				->set_content_type('application/json')
				->set_status_header($response['status'])
				->set_output(json_encode($response));
			}
		}
	}


}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */