<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Website extends MX_Controller {

    var $custom_data;

    function Website()
    {
        parent::__construct();

		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');

		if ($this->tank_auth->is_logged_in()) {
            $this->custom_data['UserId'] = $this->tank_auth->get_user_id();
            $this->custom_data['UserName'] = $this->tank_auth->get_username();
		} else {
			redirect('/website/login/');
		}
    }

	public function index()
	{
		$this->load->view('body', $this->custom_data);
	}
}