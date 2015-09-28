<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cUsuario extends MY_Main {

    /**
     * Variavel que contem as regras de validacao do formulario
     * @var array
     */
    function __construct() {
        parent::__construct();

        // # --
        // # carregar models
        // # --
        $this->load->model('m_usuario', 'm_usuario');


        // # --
        // # definicao das regras de validacao do formulario de cadastro login
        // # --
        $this->regras_validacao_formulario = array
            (
            array('senha', 'SENHA', 'required|min_length[6]|max_length[8]|matches[confirmarsenha]'),
            array('confirmarsenha', 'CONFIRMAR SENHA', 'required|min_length[6]|max_length[8]'),
            array
                (
                'field' => 'pes_id',
                'label' => 'Pessoa',
                'rules' => 'required|xss_clean'
            ),
            array
                (
                'field' => 'usu_usuario',
                'label' => 'Usuário',
                'rules' => 'required|min_length[6]|xss_clean'
            ),
            array
                (
                'field' => 'usu_senha',
                'label' => 'Senha',
                'rules' => 'required|min_length[6]|max_length[13]|matches[usu_confirmarsenha]|xss_clean'
            ),
            array
                (
                'field' => 'usu_confirmarsenha',
                'label' => 'Confirmar Senha',
                'rules' => 'required|min_length[6]|max_length[13]|xss_clean'
            ),
        );
    }

    /* -----------------------------------------------
      @ MÉTODO INDEX
      ----------------------------------------------- */

    public function index() {

        $this->cadastrar();
    }

    /* -----------------------------------------------
      @ CADASTRAR USUÁRIO
      ----------------------------------------------- */

    public function cadastrar() {


        // # scripts e estilos
        /* JGROWL */
        $this->addStyle('statics/admin/css/plugins/jquery.jgrowl.css');
        $this->addScript('statics/admin/js/plugins/jGrowl/jquery.jgrowl.js');
        /* DATABLE */
        $this->addScript('statics/admin/js/plugins/dataTables/jquery.datatables.min.js');
        $this->addScript('statics/admin/js/triggers/datatables.js');

        /* Enviando todos os registros de usuarios para a View */
        $this->data['retrieve'] = $this->m_usuario->listarUsuarios();

        /* Enviando dados para popular os select  */
        $dadosPessoa = $this->m_usuario->listarPessoas();
        $this->data['select_pessoas'] = $this->montarDropdown($dadosPessoa, 'Selecione', 'pes_id', 'pes_nome');

        // # load swf_viewport(xmin, xmax, ymin, ymax)
        $this->loadtemplate('vCadastrarUsuario');
    }

    /* -----------------------------------------------
      @ GRAVAR
      ----------------------------------------------- */

    public function gravar() {

        // # validando o formulario
        $this->form_validation->set_rules($this->regras_validacao_formulario);
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('erroValidacaoFormulario', validation_errors());
            redirect(base_url() . 'usuario/cUsuario/cadastrar');
        } else {
            $token = $this->session->userdata('token');
            $dados = array(
                'pes_id' => $this->input->post('pes_id'),
                'usu_usuario' => $this->input->post('usu_usuario'),
                'usu_senha' => md5($this->input->post('usu_senha') . $token),
                'usu_permissao' => '1',
                'usu_criado' => date("Y-m-d H:i:s"),
            );
            $query = $this->m_usuario->gravar($dados);
            if ($query)
                $this->session->set_flashdata('registroInseridoComSucesso', 'Pessoa inserida com sucesso!');
            redirect(base_url() . 'usuario/cUsuario/cadastrar/', 'refresh');
        }
    }

    /* END GRAVAR */




    /* -----------------------------------------------
      @ Deletar
      - Deleta o departamento de acordo com o parâmetro passado no metodo deletar();
      ----------------------------------------------- */

    public function deletar($idDepartamento) {

        $query = $this->m_departamento->deletar($idDepartamento);
        if ($query == TRUE) {
            $this->session->set_flashdata('registroDeletadoComSucesso', ' Departamento deletado com sucesso');
            redirect(base_url() . 'departamento/cDepartamento/index', 'refresh');
        } else {
            $pessoasNoDepartamento = $this->m_departamento->contarPessoasNoDepartamento($idDepartamento);
            $nomeDepartamento = $this->m_departamento->nomeDepartamento($idDepartamento);
            $this->session->set_flashdata('falhaDelecaoDoRegistro', ' O departamento <strong>' . $nomeDepartamento . '</strong> não pode ser deletado. Existe ' . $pessoasNoDepartamento . " pessoa(s) associada(s) a este departamento.");
            redirect(base_url() . 'departamento/cDepartamento/index', 'refresh');
        }
    }

    /* -----------------------------------------------
      @ MÉTODO EDITAR
      - Responsavel por editar o departamento;
      ----------------------------------------------- */

    public function editar($idDepartamento) {

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

        /* Enviando dados do registro selecionado */
        $this->data['retrieve'] = $this->m_departamento->dados($idDepartamento);

        // # load view
        $this->loadtemplate('vEditarDepartamento');
    }

    /* -----------------------------------------------
      @ MÉTODO PROCESSA EDITAR
      - Responsavel por processar as alterações;
      ----------------------------------------------- */

    public function processaEditar($idDepartamento) {

        // # validando o formulario
        $this->form_validation->set_rules($this->regras_validacao_formulario);
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('erroValidacaoFormulario', validation_errors());
            redirect(base_url() . 'departamento/cDepartamento/editar/' . $idDepartamento, 'refresh');
        } else {
            /* Se o usuário selecionar imagem para upload */
            if (strlen($_FILES['userfile']['name']) > 0) {

                /* Deleta Imagem Atual */
                $this->m_departamento->deletefile('tb_departamento', 'dep_id', $idDepartamento, 'departamento', 'dep_thumborganograma');

                /* Processa Nova Imagem */
                $thumb = $this->uploadfoto('departamento', 'departamento/cDepartamento/editar/', '750', '750', $idDepartamento, TRUE);


                $dados = array(
                    'dep_thumborganograma' => $thumb,
                    'dep_nome' => $this->input->post('dep_nome'),
                    'dep_ultimamodificacao' => date("Y-m-d H:i:s"),
                );
                $query = $this->m_departamento->editar($idDepartamento, $dados);
                if ($query)
                    $this->session->set_flashdata('registroEditadoComSucesso', 'Departamento editado com sucesso!');
                redirect(base_url() . 'departamento/cDepartamento/editar/' . $idDepartamento, 'refresh');
            }
            else {
                $dados = array(
                    'dep_nome' => $this->input->post('dep_nome'),
                    'dep_ultimamodificacao' => date("Y-m-d H:i:s"),
                );
                $query = $this->m_departamento->editar($idDepartamento, $dados);
                if ($query)
                    $this->session->set_flashdata('registroEditadoComSucesso', 'Departamento editado com sucesso!');
                redirect(base_url() . 'departamento/cDepartamento/editar/' . $idDepartamento, 'refresh');
            }
        }
    }

    function montarDropdown($dados, $primeiroOption, $indice, $valor) {
        $arrAux = array('' => $primeiroOption);
        foreach ($dados as $key => $value) {
            $arrAux[$value->$indice] = $value->$valor;
        }
        return $arrAux;
    }

}

/* END CLASS */

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */



