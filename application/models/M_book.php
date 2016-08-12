<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_book extends CI_Model {

	public function getAllBook()
	{
		return $this->db->select('id,title,author')->from('books')->order_by('id','desc')->get()->result();
	}

	public function getDetailBook($id)
	{
		return $this->db->select('*')->from('books')->where('id',$id)->get()->row();	
	}

	public function createBook($data)
	{
		$this->db->insert('books',$data);
		return array('status'=>201, 'message'=> 'Data has been created');
	}

	public function updateBook($data,$id)
	{
		$data = array_merge($data,array("updated_at"=>date("Y-m-d H:i:s")));
		$this->db->where('id',$id)->update('books',$data);
		return array('status'=>201, 'message'=> 'Data has been updated');	
	}

	public function deleteBook($id)
	{
		$this->db->where('id',$id)->delete('books');
		return array('status'=>201, 'message'=> 'Data has been deleted');	
	}

}

/* End of file M_book.php */
/* Location: ./application/models/M_book.php */