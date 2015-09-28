<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cFullanos extends MY_Main {

    /**
     * Variavel que contem as regras de validacao do formulario
     * @var array
     */
    function __construct() {
        parent::__construct();
    }

    /* -----------------------------------------------
      @ MÉTODO CADASTRAR
      ----------------------------------------------- */

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
        $this->data['retrieve'] = $this->m_crud->get_allOrderby('tb_fullanos', 'ful_id', 'desc');
        $this->loadtemplate('vCadastrar');
    }

    /* -----------------------------------------------
      @ GRAVAR
      ----------------------------------------------- */

    public function gravar() {

        $validation = array(
            array('ful_nome', 'NOME', 'required'),
            array('ful_cargo', 'CARGO', 'required'),
        );

        $insert = array(
            array('ful_nome', $this->input->post('ful_nome')),
            array('ful_cargo', $this->input->post('ful_cargo')),
        );

        $settings = array(
            /* THUMB */
            'thumb_diretorio'   => 'fullanos',
            'thumb_retorno'     => 'fullanos/cFullanos/cadastrar',
            'thumb_width'       => '220',
            'thumb_height'      => '220',
            'thumb_id'          => '',
            'thumb_ratio'       => TRUE,
            'thumb_crop'        => TRUE,
            'thumb_campo'       => 'ful_thumb',
            /* TABELA E OPERACOES */
            'tabela'            => 'tb_fullanos',
            'retorno_arquivo'   => 'vCadastrar',
            'retorno_funcao'    => 'fullanos/cFullanos/cadastrar/', //diretorio do modulo
            /* TITLES */
            'titleSection'      => '',
            'subtitleSection'   => '',
        );

        $this->crud_addGallery($validation, $insert, $settings);
    }

    /* -----------------------------------------------
      @ EDITAR
      ----------------------------------------------- */

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
        $this->data['ful_nome'] = $this->m_crud->get_rowSpecific('tb_fullanos', 'ful_id', $idEntry, 1, 'ful_nome');
        $this->data['ful_cargo'] = $this->m_crud->get_rowSpecific('tb_fullanos', 'ful_id', $idEntry, 1, 'ful_cargo');
        $this->data['ful_thumb'] = $this->m_crud->get_rowSpecific('tb_fullanos', 'ful_id', $idEntry, 1, 'ful_thumb');
        $this->data['ful_id'] = $idEntry;
        $this->data['voltar'] = 'fullanos/cFullanos/cadastrar';
        $this->loadtemplate('vEditar');
    }

    /* -----------------------------------------------
      @ ALTERAR
      ----------------------------------------------- */

    public function alterar($idEntry) {

        $validation = array(
            array('ful_nome', 'NOME', 'required'),
            array('ful_cargo', 'CARGO', 'required'),
        );

        $insert = array(
            array('ful_nome', $this->input->post('ful_nome')),
            array('ful_cargo', $this->input->post('ful_cargo')),
        );

        $settings = array(
            /* THUMB */
            'thumb_diretorio'   => 'fullanos',
            'thumb_retorno'     => 'fullanos/cFullanos/cadastrar',
            'thumb_width'       => '220',
            'thumb_height'      => '220',
            'thumb_id'          => '',
            'thumb_ratio'       => TRUE,
            'thumb_crop'        => TRUE,
            'thumb_campo'       => 'ful_thumb',
            /* TABELA E OPERACOES */
            'tabela'            => 'tb_fullanos',
            'retorno_arquivo'   => 'vCadastrar',
            'retorno_funcao'    => 'fullanos/cFullanos/editar/' . $idEntry, //diretorio do modulo
            'referenceValue'    => 'ful_id',
            'entryValue'        => $idEntry,
            /* TITLES */
            'titleSection'      => '',
            'subtitleSection'   => '',
        );


        $this->crud_editGallery($validation, $insert, $settings);
    }

    /* -----------------------------------------------
      @ DELETAR
      ----------------------------------------------- */

    public function deletar($idEntry) {
        $this->m_crud->delete_dataAndFile('tb_fullanos', 'ful_id', $idEntry, 'ful_thumb', 'fullanos');
        redirect(base_url() . 'fullanos/cFullanos/cadastrar');
    }

}

/* END CLASS */


