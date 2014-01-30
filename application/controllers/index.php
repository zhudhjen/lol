<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Index extends CI_controller
	{
		public function __construct()
		{
			parent::__construct();		
			$this->load->model('vote_model');
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('parser');
		}

		public function index()
		{			
			$this->data = array(
				'skin' => array(
					$this->vote_model->skin_get_first_skin(),
					$this->vote_model->skin_get_second_skin(),
					$this->vote_model->skin_get_third_skin(),
				),
				'voice'=> array(
					$this->vote_model->voice_get_first_voice(),	
					$this->vote_model->voice_get_second_voice(),	
					$this->vote_model->voice_get_third_voice(),	
				),
			);  
            $this->title = array(
                 'title' => 'Home'
            );
            //var_dump($this->data);
            $this->parser->parse('templates/header', $this->title);
			$this->parser->parse('lol/index',$this->data);
			$this->load->view('templates/footer');
		}
		
		public function vote_skin($id)
		{
			$this->vote_model->skin_vote_this_one($id);
            $this->index();
		}

		public function vote_voice($id)
		{
			$this->vote_model->voice_vote_this_one($id);
            $this->index();
		}
	}
?>
