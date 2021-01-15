<?php


class Connexion extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function connexion () {


		$this->form_validation->set_rules('mail', 'Mail', 'required');
		$this->form_validation->set_rules('mdp', 'Mdp', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('connexion');
			$this->load->view('templates/footer');

		}
		else
		{

			$result = $this->user_model->check_user();

			if (!is_null($result)) {

				session_start();
				$_SESSION['prenom'] = $result['prenom_uti'];
				$_SESSION['nom'] = $result['nom_uti'];
				header('Location: index.php');

			}else {
//				header('Location: ' . base_url('index.php/connexion/connexion'));
			}
		}

    }

    public function inscription () {

		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('prenom', 'Prenom', 'required');
		$this->form_validation->set_rules('mail', 'Mail', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('inscription');
			$this->load->view('templates/footer');

		}
		else
		{

			$result = $this->user_model->set_user();

			if (!is_null($result)) {

				session_start();
				$_SESSION['prenom'] = $result['prenom_uti'];
				$_SESSION['nom'] = $result['nom_uti'];
				print_r($_SESSION);
				header('Location: ' . base_url('index.php'));

			}
			else {
				header('Location' . base_url('index.php/connexion/inscription'));
			}
		}

    }

    public function deconnexion () {

        session_unset();
        session_destroy();
		header('Location: ' . base_url('index.php'));

	}

}
