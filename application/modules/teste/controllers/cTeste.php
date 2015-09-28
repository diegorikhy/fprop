<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cTeste extends MY_Main {

    /**
     * Variavel que contem as regras de validacao do formulario 
     * @var array
     */
    function __construct() {
        parent::__construct();
    }

    /* -----------------------------------------------	
      @ MÉTODO EDITAR
      ----------------------------------------------- */

    public function editar() {


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



        $this->data['tes_titulo'] = $this->m_crud->get_rowSpecific('tb_teste', 'tes_id', '1', 1, 'tes_titulo');
        $categorias = $this->m_crud->get_allOrderby('tb_teste', 'tes_id', 'asc');
        $this->data['categorias'] = $this->montarDropdown($categorias, 'Selecione uma Categoria', 'tes_id', 'tes_titulo');



        // # load view
        $this->loadtemplate('vEditar');
    }

    /* -----------------------------------------------	
      @ ALTERAR
      ----------------------------------------------- */

    public function alterar() {

        $validation = array(
            array('tes_titulo', 'TÍTULO', 'required'),
        );

        $insert = array(
            array('tes_titulo', $this->input->post('tes_titulo')),
        );

        $settings = array(
            /* TABELA E OPERAÇÕES */
            'tabela' => 'tb_teste',
            'retorno_arquivo' => 'vEditar',
            'retorno_funcao' => 'teste/cTeste/editar/',
            /* EDIÇÃO */
            'referenceValue' => 'tes_id',
            'entryValue' => 1,
            /* TITULOS */
            'titleSection' => 'Teste',
            'subtitleSection' => 'Editar',
        );

        $this->crud_editData($validation, $insert, $settings);
    }

}

/* END CLASS */

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */



