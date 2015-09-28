<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angularjs extends CI_Controller {

  public $data;

  function __construct() {
    parent::__construct();
    $this->data = array();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->helper('html');
    $this->load->helper('array');
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->model('m_crud', 'crud');
    $this->load->library('my_date');
    $this->load->library('my_phpmailer');

    $this->data['hidden'] = array('submitForm' => TRUE);
    $this->data['current_class'] = '';
  }

  public function index()
  {
    $this->load->view('angular_view');
  }

  public function get_list() {

    $data = $this->m_crud->get_all('tb_usuario');
    $this->output->set_content_type('application/json')->set_output(json_encode($data));
  }
}
