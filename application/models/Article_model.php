<?php

class Article_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_articles ($slug = FALSE) {

		if ($slug == FALSE) {

			$query = $this->db->get('Article');
			return $query->result_array();

		}

		$query = $this->db->get_where('Article', array('id_arti' => $slug));
		return $query->result_array();

	}

}

