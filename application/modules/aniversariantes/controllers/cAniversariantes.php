<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cAniversariantes extends MY_Main {

    /**
     * Variavel que contem as regras de validacao do formulario 
     * @var array
     */
    function __construct() {
        parent::__construct();


        $this->data['current_module'] = 'aniversariantes';

        // # --
        // # carregar models
        // # --
        $this->load->model('mAniversariantes', 'mAniversariantes');

        // # -- 
        // # definicao das regras de validacao do formulario de cadastro login
        // # -- 
        $this->regras_validacao_formulario = array
            (
            array
                (
                'field' => 'dep_nome',
                'label' => 'Nome do Departamento',
                'rules' => 'required|xss_clean'
            ),
        );
    }

    /* -----------------------------------------------	
      @ MÉTODO INDEX
      ----------------------------------------------- */

    public function index() {

        $this->listar();
    }

    /* -----------------------------------------------	
      @ LISTAR
      ----------------------------------------------- */

    public function aniversariantesDoMes() {

        /* DATABLE */
        $this->addScript('statics/admin/js/plugins/dataTables/jquery.datatables.min.js');
        $this->addScript('statics/admin/js/triggers/datatables.js');


        /* Enviando todos os registros para a View */
        $this->data['retrieve'] = $this->mAniversariantes->aniversariantesDoMes();

        // # load view
        $this->loadtemplate('vAniversariantesDoMes');
    }

}

/* END CLASS */

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */



