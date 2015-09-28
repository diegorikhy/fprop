<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class cClientes extends MY_Main {

    function __construct() {
      parent::__construct();
    }

    public function cadastrar() {
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
      $this->data['retrieve'] = $this->m_crud->get_allOrderby('tb_clientes', 'cli_id', 'desc');
      $this->loadtemplate('vCadastrar');
    }

    public function gravar() {

      $validation = array(
        array('cli_url', 'URL', 'required'),
        );

      $insert = array(
        array('cli_url', $this->input->post('cli_url')),
        );

      $settings = array(
        /* THUMB */
        'thumb_diretorio'       => 'clientes',
        'thumb_retorno'         => 'clientes/cClientes/cadastrar',
        'thumb_width'           => '280',
        'thumb_height'          => '100',
        'thumb_id'              => '',
        'thumb_ratio'           => TRUE,
        'thumb_crop'            => TRUE,
        'thumb_campo'           => 'cli_thumb',
        /* TABELA E OPERACOES */
        'tabela'                => 'tb_clientes',
        'retorno_arquivo'       => 'vCadastrar',
        'retorno_funcao'        => 'clientes/cClientes/cadastrar/', //diretorio do modulo

        /* TITLES */
        'titleSection' => '',
        'subtitleSection' => '',
      );

      $this->crud_addGallery($validation, $insert, $settings);
    }

    public function editar($idEntry) {
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
      $this->data['cli_url'] = $this->m_crud->get_rowSpecific('tb_clientes', 'cli_id', $idEntry, 1, 'cli_url');
      $this->data['cli_thumb'] = $this->m_crud->get_rowSpecific('tb_clientes', 'cli_id', $idEntry, 1, 'cli_thumb');
      $this->data['cli_id'] = $idEntry;
      $this->data['voltar'] = 'clientes/cClientes/cadastrar';
      $this->loadtemplate('vEditar');
    }

    public function alterar($idEntry) {

      $validation = array(
        array('cli_url', 'URL', 'required')
        );

      $insert = array(
        array('cli_url', $this->input->post('cli_url'))
        );

      $settings = array(
        /* THUMB */
        'thumb_diretorio'       => 'clientes',
        'thumb_retorno'         => 'clientes/cClientes/cadastrar',
        'thumb_width'           => '280',
        'thumb_height'          => '100',
        'thumb_id'              => '',
        'thumb_ratio'           => TRUE,
        'thumb_crop'            => TRUE,
        'thumb_campo'           => 'cli_thumb',
        /* TABELA E OPERAÇÕES */
        'tabela'                => 'tb_clientes',
        'retorno_arquivo'       => 'vCadastrar',
        'retorno_funcao'        => 'clientes/cClientes/editar/' . $idEntry, //diretorio do modulo
        'referenceValue'        => 'cli_id',
        'entryValue'            => $idEntry,
        /* TITLES */
        'titleSection'          => '',
        'subtitleSection'       => '',
      );

      $this->crud_editGallery($validation, $insert, $settings);
    }

    public function deletar($idEntry) {

      $this->m_crud->delete_dataAndFile('tb_clientes', 'cli_id', $idEntry, 'cli_thumb', 'clientes');
      redirect(base_url() . 'clientes/cClientes/cadastrar');
    }

  }

  /* END CLASS */



