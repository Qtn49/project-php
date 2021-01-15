<?php


class User_model extends CI_Model
{

	public function __construct()
	{

		$this->load->database();

	}

	public function check_user () {

		$this->load->helper('url');

		return $this->db->select("*")->from("Utilisateur")->where("mail_uti", $this->input->post('mail'))->where("mdp_uti", md5($this->input->post('mdp')))->get();

	}

	public function set_user () {

		$this->load->helper('url');

		$data = array(
			'prenom_uti' => $this->input->post('prenom'),
			'nom_uti' => $this->input->post('nom'),
			'mail_uti' => $this->input->post('mail'),
			'mdp_uti' => $this->input->post('password')
		);

		return $this->db->insert('Utilisateur', $data);

	}

}
