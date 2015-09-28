<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Site extends CI_Controller {

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

    $this->data['images_url'] = base_url() . "statics/site/images/";
    $this->data['css_url'] = base_url() . "statics/site/css/";
    $this->data['js_url'] = base_url() . "statics/site/js/";

    $this->data['hidden'] = array('submitForm' => TRUE);
    $this->data['current_class'] = '';
  }

  public function index() {
    $this->data['page_name']     = 'home';
    $this->data['current_class'] = 'home';
    $this->data['cases']         = $this->m_crud->get_allOrderby('tb_cases', 'cas_ordem, criado', 'asc');
    $this->data['fullanos']      = $this->m_crud->get_allOrderby('tb_fullanos', 'ful_id', 'asc');
    $this->data['clientes']      = $this->m_crud->get_allOrderby('tb_clientes', 'cli_id', 'asc');
    $this->data['telefone']      = $this->m_crud->get_rowSpecific('tb_configuracoesgerais', 'con_id', 1, 1, 'con_telefone');
    $this->data['email']         = $this->m_crud->get_rowSpecific('tb_configuracoesgerais', 'con_id', 1, 1, 'con_email');
    $this->data['coordenadax']   = $this->m_crud->get_rowSpecific('tb_configuracoesgerais', 'con_id', 1, 1, 'con_coordenadax');
    $this->data['coordenaday']   = $this->m_crud->get_rowSpecific('tb_configuracoesgerais', 'con_id', 1, 1, 'con_coordenaday');
    $this->data['urlvideo']      = $this->m_crud->get_rowSpecific('tb_configuracoesgerais', 'con_id', 1, 1, 'con_urlvideo');
    $this->data['facebook']      = $this->m_crud->get_rowSpecific('tb_configuracoesgerais', 'con_id', 1, 1, 'con_facebook');
    $this->data['instagram']     = $this->m_crud->get_rowSpecific('tb_configuracoesgerais', 'con_id', 1, 1, 'con_twitter');

    $this->show_template('index', $this->data);
  }

  public function processa_contato() {

    if ($this->input->post('nomecompleto') != '') {
      redirect(base_url());
      return false;
    }

    $urlImagem = base_url() . 'statics/site/images/logo-email.png';
    $mensagem = "<table style=\"border-bottom: 2px dotted #eee; margin: 30px auto 20px;width:740px;\"><tr><td style=\"padding-bottom: 10px;\"><img src='" . $urlImagem . "' style='display:block;' alt='' width='174' height='103' /></td><td style=\"text-align:right\"><strong style=\"height: 103px; line-height: 103px; font-family:arial, sans-serif; color:#666; font-size: 24px; margin-right: 50px;padding-bottom: 10px;\">Novo Contato<strong></td></tr></table>";
    $key = 1;

    $info = Array(
      Array('Nome',     $this->input->post('nome')    ),
      Array('E-mail',   $this->input->post('email')   ),
      Array('Mensagem', $this->input->post('mensagem'))
    );

    foreach ($info as $item) {
      if ($item[1] != '') {
        $bg = $key == 1 ? '#F5F2F0' : '#EEE9E6';

        $mensagem .= "<div style=\"background:$bg;min-height:20px;"
                . "line-height:20px;font-family:arial, sans-serif;color:#666;"
                . "padding:15px 25px;width:680px;margin: 0 auto;font-size:16px;\"><strong>" . $item[0] . ":</strong> "
                . $item[1] . "</div>";

        $key = $key == 1 ? 0 : 1;
      }
    }
    $mensagem .= "<table style=\"margin: 30px 0;width:100%;\"><tr><td>&nbsp; </td></tr></table>";

    $email_config = Array(
      'mailtype' => 'html',
      'starttls' => true,
      'newline' => "\r\n"
    );

    $this->load->library('email', $email_config);
    $this->email->from('full@fullpropaganda.com.br');
    $this->email->to('full@fullpropaganda.com.br');
    $this->email->cc('full@fullpropaganda.com.br');
    // $this->email->from('gtidiegohvieira@gmail.com');
    // $this->email->to('gtidiegohvieira@gmail.com');
    // $this->email->cc('gtidiegohvieira@gmail.com');
    $this->email->subject('Novo Contato - Full Propaganda');
    $this->email->message($mensagem);
    $email = $this->email->send();

    if ($email) {
      $this->session->set_flashdata('contato-sucesso', 'Formulário enviado com sucesso! Obrigado.');
      redirect(base_url() . '#contato', 'refresh');
    } else {
      $this->session->set_flashdata('contato-erro', 'Ocorreu um problema durante o envio. Tente novamente!');
      redirect(base_url() . '#contato', 'refresh');
    }
  }

  public function processa_trabalheconosco() {

    if ($this->input->post('nomecompleto') != '') {
      redirect(base_url());
      return false;
    }

    $urlImagem = base_url() . 'statics/site/images/logo-email.png';
    $mensagem = "<table style=\"border-bottom: 2px dotted #eee; margin: 30px auto 20px;width:740px;\"><tr><td style=\"padding-bottom: 10px;\"><img src='" . $urlImagem . "' style='display:block;' alt='' width='174' height='103' /></td><td style=\"text-align:right\"><strong style=\"height: 103px; line-height: 103px; font-family:arial, sans-serif; color:#666; font-size: 24px; margin-right: 50px;padding-bottom: 10px;\">Mais um Fullano<strong></td></tr></table>";
    $key = 1;

    $info = Array(
      Array('E-mail', $this->input->post('email')),
      Array('Currículo', 'Em anexo')
    );

    foreach ($info as $item) {
      if ($item[1] != '') {
        $bg = $key == 1 ? '#F5F2F0' : '#EEE9E6';

        $mensagem .= "<div style=\"background:$bg;min-height:20px;"
                . "line-height:20px;font-family:arial, sans-serif;color:#666;"
                . "padding:15px 25px;width:680px;margin: 0 auto;font-size:16px;\"><strong>" . $item[0] . ":</strong> "
                . $item[1] . "</div>";

        $key = $key == 1 ? 0 : 1;
      }
    }
    $mensagem .= "<table style=\"margin: 30px 0;width:100%;\"><tr><td>&nbsp; </td></tr></table>";

    $email_config = Array(
      'mailtype' => 'html',
      'starttls' => true,
      'newline' => "\r\n"
    );

    $this->load->library('email', $email_config);
    $this->email->from('full@fullpropaganda.com.br');
    $this->email->to('full@fullpropaganda.com.br');
    $this->email->cc('full@fullpropaganda.com.br');
    // $this->email->from('gtidiegohvieira@gmail.com');
    // $this->email->to('gtidiegohvieira@gmail.com');
    // $this->email->cc('gtidiegohvieira@gmail.com');
    $this->email->subject('Mais um Fullano - Full Propaganda');
    $this->email->message($mensagem);
    $this->email->attach($this->uploadarquivo('trabalheconosco/'));
    $email = $this->email->send();

    if ($email) {
      $this->session->set_flashdata('trabalhe-sucesso', 'Formulário enviado com sucesso! Obrigado.');
      redirect(base_url() . '#contato', 'refresh');
    } else {
      $this->session->set_flashdata('trabalhe-erro', 'Ocorreu um problema durante o envio. Tente novamente!');
      redirect(base_url() . '#contato', 'refresh');
    }
  }

  public function uploadarquivo($diretorio) {

    $config['upload_path'] = './uploads/' . $diretorio;
    $config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG|doc|DOC|docx|DOCX|ppt|PPT|pptx|PPTX|pdf|PDF';
    $config['max_size'] = '10000';
    $config['max_width'] = '5000';
    $config['max_height'] = '5000';
    $config['overwrite'] = FALSE;

    $this->load->library('upload', $config);

    $this->upload->initialize($config);

    if (!$this->upload->do_upload()) {
      $error = array('error' => $this->upload->display_errors());
      $this->session->set_flashdata('erroUploadImagem', $error['error']);
    } else {
      $data = array('upload_data' => $this->upload->data());
      return $data['upload_data']['full_path'];
    }
  }

  public function show_template($views, $data) {

    // $this->load->view('header', $data);

    if (is_array($views)) {
      if (count($views) > 0) {
        foreach ($views as $view) {
          $this->load->view($view, $data);
        }
      } else {
        $this->load->view($views, $data);
      }
    } else {
      $this->load->view($views, $data);
    }

    // $this->load->view('footer');
  }
}
