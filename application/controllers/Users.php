<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_user');
	}

	public function index()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method!="GET"){
			$this->output->set_content_type('application/json');
			$this->output->set_status_header(400);
			$this->output->set_output(json_encode(array('status' => 400,'message' => 'Bad request.')));
		}else{
			$cekAuthClient = $this->M_auth->checkAuthClient();
			if($cekAuthClient==true){
				$auth = $this->M_auth->auth();
				if($auth["status"]==200){
					$user = $this->M_user->getAllUser();
					$this->output->set_content_type('application/json');
					$this->output->set_status_header($auth["status"]);
					$this->output->set_output(json_encode(array('status' => $auth["status"],'message' => $user)));
				}
			}
		}
	}

	public function detail($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method!="GET"){
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode(array('status'=> 400, 'message'=> 'Bad Request')));
		}else{
			$cekAuthClient = $this->M_auth->checkAuthClient();
			if($cekAuthClient==true){
				$auth = $this->M_auth->auth();
				if($auth["status"]==200){
					$user = $this->M_user->getDetailUser($id);
					$this->output
						->set_content_type('application/json')
						->set_status_header($auth['status'])
						->set_output(json_encode(array('status'=>$auth['status'],'message'=>$user)));
				}
			}
		}
	}

	public function create()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method!="POST"){
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode(array('status'=>400, 'message'=> 'Bad Request')));
		}else{
			$cekAuthClient = $this->M_auth->checkAuthClient();
			if($cekAuthClient==true){
				$auth = $this->M_auth->auth();
				if($auth['status']==200){
					$isAdmin = $this->M_auth->isAdmin();
					if($isAdmin==true){

						$params = json_decode( file_get_contents('php://input'),TRUE);
						if($params['username']=="" || $params['password']=="" || $params['fullname']==""){
							$this->output
								->set_content_type('application/json')
								->set_status_header(401)
								->set_output(json_encode(array('status'=>401, 'message'=> "This Username,Password,Fullname can\'t empty.")));
						}else{
							$user = $this->M_user->createUser($params);
							$this->output
								->set_content_type('application/json')
								->set_status_header($user['status'])
								->set_output(json_encode($user));
						}
					}
				}
			}
		}
	}

	public function update($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method!="PUT"){
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode(array('status'=>400, 'message'=> 'Bad Request')));
		}else{
			$cekAuthClient = $this->M_auth->checkAuthClient();
			if($cekAuthClient==true){
				$auth = $this->M_auth->auth();
				if($auth['status']==200){
					$isAdmin = $this->M_auth->isAdmin();
					if($isAdmin==true){
						$params = json_decode( file_get_contents('php://input'),TRUE);
						if($params['username']=="" || $params['fullname']==""){
							$this->output
								->set_content_type('application/json')
								->set_status_header(401)
								->set_output(json_encode(array('status'=>401, 'message'=> "This Username,Fullname can\'t empty.")));
						}else{
							$user = $this->M_user->updateUser($params,$id);
							$this->output
								->set_content_type('application/json')
								->set_status_header($user['status'])
								->set_output(json_encode($user));
						}
					}
				}
			}
		}
	}

	public function delete($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method!="DELETE"){
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode(array('status'=>400, 'message'=> 'Bad Request')));
		}else{
			$cekAuthClient = $this->M_auth->checkAuthClient();
			if($cekAuthClient==true){
				$auth = $this->M_auth->auth();
				if($auth['status']==200){
					$isAdmin = $this->M_auth->isAdmin();
					if($isAdmin==true){
						
						$user = $this->M_user->deleteUser($id);
						$this->output
							->set_content_type('application/json')
							->set_status_header($user['status'])
							->set_output(json_encode($user));
					
					}
				}
			}
		}
	}

	public function updatePassword()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method!="PUT"){
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode(array('status'=>400, 'message'=> 'Bad Request')));
		}else{
			$cekAuthClient = $this->M_auth->checkAuthClient();
			if($cekAuthClient==true){
				$auth = $this->M_auth->auth();
				if($auth['status']==200){
					$params = json_decode( file_get_contents('php://input'),TRUE);
					
					if($params['old_pass']=="" || $params['new_pass']=="" || $params['conf_pass']==""){
						$this->output
							->set_content_type('application/json')
							->set_status_header(401)
							->set_output(json_encode(array('status'=>401, 'message'=> "This form can\'t empty.")));
					}

					$id = $this->input->get_request_header('User-ID', TRUE);
					$user = $this->M_user->updateUserPassword($params,$id);
					$this->output
						->set_content_type('application/json')
						->set_status_header($user['status'])
						->set_output(json_encode($user));
				}
			}
		}
		
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */