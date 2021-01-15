<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('article_model');
		$this->load->helper('url');

	}

	public function view ($slug = FALSE) {

		session_start();

		if ($slug == FALSE)
			$data['articles'] = $this->article_model->get_articles();
		else
			$data['articles'] = $this->article_model->get_articles($slug);

    	$this->load->view('templates/header.php');
    	$this->load->view('display.php', $data);
    	$this->load->view('templates/footer.php');

    }

}
