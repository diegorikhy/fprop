<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class cConfiguracoesgerais extends MY_Main {

  /**
   * Variavel que contem as regras de validacao do formulario
   * @var array
   */

  function __construct()
  {
    parent::__construct();


  }

  /*-----------------------------------------------
  @ MÉTODO EDITAR
  -----------------------------------------------*/
  public function editar()
  {


    // # scripts e estilos
    /* JGROWL */
    $this->addStyle('statics/admin/css/plugins/jquery.jgrowl.css');
    $this->addScript('statics/admin/js/plugins/jGrowl/jquery.jgrowl.js');
    /* DATABLE */
    $this->addScript('statics/admin/js/plugins/dataTables/jquery.datatables.min.js');
    $this->addScript('statics/admin/js/triggers/datatables.js');
    /* FILEUPLOAD */
    $this->addScript('statics/admin/js/plugins/fileupload/bootstrap-fileupload.js');
    /* LIGHTBOX */
    $this->addStyle('statics/admin/css/plugins/lightbox.css');
    $this->addScript('statics/admin/js/plugins/lightbox/lightbox.js');
    /* JWYSIWYG */
    $this->addStyle('statics/admin/css/plugins/bootstrap-wysihtml5.css');
    $this->addScript('statics/admin/js/plugins/wysihtml5/wysihtml5-0.3.0.js');
    $this->addScript('statics/admin/js/plugins/wysihtml5/bootstrap-wysihtml5.js');
    $this->addScript('statics/admin/js/triggers/wysihtml5.js');


    // # load view
    $this->data['con_email']       = $this->m_crud->get_rowSpecific('tb_configuracoesgerais', 'con_id', 1, 1, 'con_email');
    $this->data['con_telefone']    = $this->m_crud->get_rowSpecific('tb_configuracoesgerais', 'con_id', 1, 1, 'con_telefone');
    $this->data['con_endereco']    = $this->m_crud->get_rowSpecific('tb_configuracoesgerais', 'con_id', 1, 1, 'con_endereco');
    $this->data['con_coordenadax'] = $this->m_crud->get_rowSpecific('tb_configuracoesgerais', 'con_id', 1, 1, 'con_coordenadax');
    $this->data['con_coordenaday'] = $this->m_crud->get_rowSpecific('tb_configuracoesgerais', 'con_id', 1, 1, 'con_coordenaday');
    $this->data['con_urlvideo']    = $this->m_crud->get_rowSpecific('tb_configuracoesgerais', 'con_id', 1, 1, 'con_urlvideo');
    $this->data['con_urlwebmail']  = $this->m_crud->get_rowSpecific('tb_configuracoesgerais', 'con_id', 1, 1, 'con_urlwebmail');
    $this->data['con_facebook']    = $this->m_crud->get_rowSpecific('tb_configuracoesgerais', 'con_id', 1, 1, 'con_facebook');
    $this->data['con_twitter']     = $this->m_crud->get_rowSpecific('tb_configuracoesgerais', 'con_id', 1, 1, 'con_twitter');
    $this->loadtemplate( 'vEditar' );

  }


  /*-----------------------------------------------
  @ ALTERAR
  -----------------------------------------------*/
  public function alterar()
  {

    $validation = array(
      array('con_email', 'E-MAIL', 'required'),
      array('con_telefone', 'TELEFONE', 'required'),
      array('con_endereco', 'ENDEREÇO', 'required'),
      array('con_coordenadax', 'COORDENADA X', 'required'),
      array('con_coordenaday', 'COORDENADA Y', 'required'),
      array('con_urlvideo', 'URL VÍDEO', 'required'),
      array('con_facebook', 'FACEBOOK', 'required'),
      array('con_twitter', 'INSTAGRAM', 'required'),
    );

    $insert = array(
      array('con_email', $this->input->post('con_email')),
      array('con_telefone', $this->input->post('con_telefone')),
      array('con_endereco', $this->input->post('con_endereco')),
      array('con_coordenadax', $this->input->post('con_coordenadax')),
      array('con_coordenaday', $this->input->post('con_coordenaday')),
      array('con_urlvideo', $this->input->post('con_urlvideo')),
      array('con_facebook', $this->input->post('con_facebook')),
      array('con_twitter', $this->input->post('con_twitter')),
    );

    $settings = array(

      /* TABELA E OPERAÇÕES*/
      'tabela'    =>    'tb_configuracoesgerais',
      'retorno_arquivo' =>    'vEditar',
      'retorno_funcao'  =>    'configuracoesgerais/cConfiguracoesgerais/editar/',

      /* EDIÇÃO */
      'referenceValue'  =>    'con_id',
      'entryValue'    =>    1,

      /* TITULOS */
      'titleSection'    =>    'Empresa',
      'subtitleSection' =>    'Editar',

    );

    $this->crud_editData($validation, $insert, $settings);
  }





}
/* END CLASS */

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */



