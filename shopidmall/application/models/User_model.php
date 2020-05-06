<?php
class User_model extends CI_Model{
	public function register(){
		$post_data = $this->input->post();
		$boxes = [$post_data['user'],$post_data['admin']];
		$len = count($boxes);
		if($boxes[0] != ""){
			$admin = false;
		}else if($boxes[1] != ""){
			$admin = true;
		}
		$data = [
			'username' => $post_data['username_rg'],
			'email'    => $post_data['email'],
			'password' => $post_data['password_rg'],
			'admin'    => $admin
		];
		$insert = $this->db->insert('users',$data);
		return $insert;
	}
	public function login(){
		$post_data = $this->input->post();
		$this->db->where('username',$post_data['username']);
		$this->db->where('password',$post_data['password']);
		$query = $this->db->get('users');
		return $query->result();
	}
}