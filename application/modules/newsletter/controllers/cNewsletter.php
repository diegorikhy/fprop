<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class cNewsletter extends MY_Main {

  /**
  * Variavel que contem as regras de validacao do formulario
  * @var array
  */
  function __construct() {
    parent::__construct();
    $this->data['current_module'] = 'boletiminformativo';
  }

  /* -----------------------------------------------
  @ MÉTODO CADASTRAR
  ----------------------------------------------- */

  public function listar() {

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


    /* SELEÇÃO DE DADOS - CRUD MODEL */
    $this->data['retrieve'] = $this->m_crud->get_allOrderby('tb_newsletter', 'new_id', 'desc');

    $this->loadtemplate('vListar');
  }

  /* -----------------------------------------------
  @ DELETAR
  ----------------------------------------------- */

  public function deletar($idEntry) {
    $this->m_crud->delete('tb_newsletter', 'new_id', $idEntry);
    redirect(base_url() . 'newsletter/cNewsletter/listar');
  }
}
