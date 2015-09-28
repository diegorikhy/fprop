<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cPerfilUsuario extends MY_Main {

    /**
     * Variavel que contem as regras de validacao do formulario 
     * @var array
     */
    function __construct() {
        parent::__construct();

        $this->data['current_module'] = 'perfil';
        // # --
        // # carregar models
        // # --
        $this->load->model('mPerfilUsuario', 'mPerfilUsuario');
    }

    /* -----------------------------------------------	
      @ MÉTODO INDEX
      ----------------------------------------------- */

    public function index() {
        
    }

    /* -----------------------------------------------	
      @ LISTAR
      ----------------------------------------------- */

    public function listar() {

        // # scripts e estilos
        /* JGROWL */
        $this->addStyle('statics/admin/css/plugins/jquery.jgrowl.css');
        $this->addScript('statics/admin/js/plugins/jGrowl/jquery.jgrowl.js');
        /* DATABLE */
        $this->addScript('statics/admin/js/plugins/dataTables/jquery.datatables.min.js');
        $this->addScript('statics/admin/js/triggers/datatables.js');
        /* FILEUPLOAD */
        $this->addScript('statics/admin/js/plugins/fileupload/bootstrap-fileupload.js');


        $this->data['retrieve'] = $this->mPerfilUsuario->listar();

        // # load
        $this->loadtemplate('vPessoas');
    }

    /* -----------------------------------------------	
      @ PERFIL PESSOA
      ----------------------------------------------- */

    public function perfilPessoa($idPessoa) {

        $this->data['dadosPessoa'] = $this->mPerfilUsuario->dadosPessoa($idPessoa);
        $this->data['dadosPessoa_telefones'] = $this->mPerfilUsuario->dadosPessoa_telefone($idPessoa);
        $this->data['dadosPessoa_endereco'] = $this->mPerfilUsuario->dadosPessoa_endereco($idPessoa);
        $this->data['dadosPessoa_email'] = $this->mPerfilUsuario->dadosPessoa_email($idPessoa);

        // # load
        $this->loadtemplate('vPerfilPessoa');
    }

    /* -----------------------------------------------	
      @ PERFIL PESSOA
      ----------------------------------------------- */

    public function meuPerfil() {

        // # load
        $this->loadtemplate('vMeuPerfil');
    }

}

/* END CLASS */

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */



