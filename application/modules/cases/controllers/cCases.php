<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cCases extends MY_Main {

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
        $this->data['retrieve'] = $this->m_crud->get_allOrderby('tb_cases', 'cas_ordem, criado', 'asc');
        $this->loadtemplate('vCadastrar');
    }

    /* -----------------------------------------------
      @ GRAVAR
      ----------------------------------------------- */

    public function gravar() {

        $ordem = 0;
        if($this->input->post('cas_ordem') != "")
          $ordem = $this->input->post('cas_ordem');

        $validation = array(
            array('cas_titulo', 'TÍTULO', 'required'),
        );

        $insert = array(
            array('cas_ordem', $ordem),
            array('cas_titulo', $this->input->post('cas_titulo')),
        );

        $settings = array(
            /* THUMB */
            'thumb_diretorio' => 'cases',
            'thumb_retorno' => 'cases/cCases/cadastrar',
            'thumb_width' => '800',
            'thumb_height' => '800',
            'thumb_id' => '',
            'thumb_ratio' => TRUE,
            'thumb_campo' => 'cas_thumb',
            'thumb_campo2'           => 'cas_foto',
            /* TABELA E OPERACOES */
            'tabela' => 'tb_cases',
            'retorno_arquivo' => 'vCadastrar',
            'retorno_funcao' => 'cases/cCases/cadastrar/', //diretorio do modulo

            /* TITLES */
            'titleSection' => '',
            'subtitleSection' => '',
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
        $this->data['cas_titulo'] = $this->m_crud->get_rowSpecific('tb_cases', 'cas_id', $idEntry, 1, 'cas_titulo');
        $this->data['cas_ordem'] = $this->m_crud->get_rowSpecific('tb_cases', 'cas_id', $idEntry, 1, 'cas_ordem');
        $this->data['cas_descricao'] = $this->m_crud->get_rowSpecific('tb_cases', 'cas_id', $idEntry, 1, 'cas_descricao');
        $this->data['cas_thumb'] = $this->m_crud->get_rowSpecific('tb_cases', 'cas_id', $idEntry, 1, 'cas_thumb');
        $this->data['cas_id'] = $idEntry;
        $this->data['voltar'] = 'cases/cCases/cadastrar';
        $this->loadtemplate('vEditar');
    }

    /* -----------------------------------------------
      @ ALTERAR
      ----------------------------------------------- */

    public function alterar($idEntry) {

        $ordem = 0;
        if($this->input->post('cas_ordem') != "")
          $ordem = $this->input->post('cas_ordem');

        $validation = array(
            array('cas_titulo', 'TÍTULO', 'required')
        );

        $insert = array(
            array('cas_ordem', $ordem),
            array('cas_titulo', $this->input->post('cas_titulo'))
        );

        $settings = array(
            /* THUMB */
            'thumb_diretorio'       => 'cases',
            'thumb_retorno'         => 'cases/cCases/cadastrar',
            'thumb_width'           => '800',
            'thumb_height'          => '800',
            'thumb_id'              => '',
            'thumb_ratio'           => TRUE,
            'thumb_campo'           => 'cas_thumb',
            /* TABELA E OPERAÇÕES */
            'tabela'                => 'tb_cases',
            'retorno_arquivo'       => 'vCadastrar',
            'retorno_funcao'        => 'cases/cCases/editar/' . $idEntry, //diretorio do modulo
            'referenceValue'        => 'cas_id',
            'entryValue'            => $idEntry,
            /* TITLES */
            'titleSection'          => '',
            'subtitleSection'       => '',
        );


        $this->crud_editGallery($validation, $insert, $settings);
    }

    /* -----------------------------------------------
      @ DELETAR
      ----------------------------------------------- */

    public function deletar($idEntry) {

        $this->m_crud->delete_dataAndFile('tb_cases', 'cas_id', $idEntry, 'cas_thumb', 'cases');
        redirect(base_url() . 'cases/cCases/cadastrar');
    }

}

/* END CLASS */



