<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_book');
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
					$book = $this->M_book->getAllBook();
					$this->output->set_content_type('application/json');
					$this->output->set_status_header($auth["status"]);
					$this->output->set_output(json_encode(array('status' => $auth["status"],'message' => $book)));
				}
			}
		}
	}

	public function detail($id)
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
					$book = $this->M_book->getDetailBook($id);
					$this->output->set_content_type('application/json');
					$this->output->set_status_header($auth["status"]);
					$this->output->set_output(json_encode(array('status' => $auth["status"],'message' => $book)));
				}
			}
		}
	}

	public function create()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method!="POST"){
			$this->output->set_content_type('application/json');
			$this->output->set_status_header(400);
			$this->output->set_output(json_encode(array('status' => 400,'message' => 'Bad request.')));
		}else{
			$cekAuthClient = $this->M_auth->checkAuthClient();
			if($cekAuthClient==true){
				$auth = $this->M_auth->auth();

				if($auth["status"]==200){
					$params = json_decode(file_get_contents('php://input'), TRUE);

					if($params["title"]=="" && $params["author"]==""){
						$this->output
							->set_content_type('application/json')
							->set_status_header(401)
							->set_output(json_encode(array('status'=>401, 'message'=>"This Title & Author can\'t empty")));
					}else{
						$book = $this->M_book->createBook($params);
						$this->output
							->set_content_type('application/json')
							->set_status_header($book['status'])
							->set_output(json_encode($book));
					}
				}
			}
		}
	}

	public function update($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method!="PUT"){
			$this->output->set_content_type('application/json');
			$this->output->set_status_header(400);
			$this->output->set_output(json_encode(array('status' => 400,'message' => 'Bad request.')));
		}else{
			$cekAuthClient = $this->M_auth->checkAuthClient();
			if($cekAuthClient==true){
				$auth = $this->M_auth->auth();

				if($auth["status"]==200){
					$params = json_decode(file_get_contents('php://input'), TRUE);

					if($params["title"]=="" && $params["author"]==""){
						$this->output
							->set_content_type('application/json')
							->set_status_header(401)
							->set_output(json_encode(array('status'=>401, 'message'=>"This Title & Author can\'t empty")));
					}else{
						$book = $this->M_book->updateBook($params,$id);
						$this->output
							->set_content_type('application/json')
							->set_status_header($book['status'])
							->set_output(json_encode($book));
					}
				}
			}
		}
	}

	public function delete($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method!="DELETE"){
			$this->output->set_content_type('application/json');
			$this->output->set_status_header(400);
			$this->output->set_output(json_encode(array('status' => 400,'message' => 'Bad request.')));
		}else{
			$cekAuthClient = $this->M_auth->checkAuthClient();
			if($cekAuthClient==true){
				$auth = $this->M_auth->auth();

				if($auth["status"]==200){
					$params = json_decode(file_get_contents('php://input'), TRUE);

					if($params["title"]=="" && $params["author"]==""){
						$this->output
							->set_content_type('application/json')
							->set_status_header(401)
							->set_output(json_encode(array('status'=>401, 'message'=>"This Title & Author can\'t empty")));
					}else{
						$book = $this->M_book->deleteBook($id);
						$this->output
							->set_content_type('application/json')
							->set_status_header($book['status'])
							->set_output(json_encode($book));
					}
				}
			}
		}
	}

}

/* End of file Books.php */
/* Location: ./application/controllers/Books.php */