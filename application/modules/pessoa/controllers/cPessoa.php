<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cPessoa extends MY_Main {

    /**
     * Variavel que contem as regras de validacao do formulario 
     * @var array
     */
    function __construct() {
        parent::__construct();

        // # --
        // # carregar models
        // # --
        $this->load->model('m_pessoa', 'm_pessoa');


        // # --
        // # carregar library
        // # --
        $this->load->library('uploadfoto');


        // # -- 
        // # definicao das regras de validacao do formulario de cadastro login
        // # -- 
        $this->regras_validacao_formulario = array
            (
            array
                (
                'field' => 'pes_nome',
                'label' => 'Nome Completo',
                'rules' => 'required|xss_clean'
            ),
            array
                (
                'field' => 'pes_apelido',
                'label' => 'Apelido',
                'rules' => 'required|xss_clean'
            ),
            array
                (
                'field' => 'dep_id',
                'label' => 'Departamento',
                'rules' => 'required|xss_clean'
            ),
            array
                (
                'field' => 'pes_nacionalidade',
                'label' => 'Nacionalidade',
                'rules' => 'required|xss_clean'
            ),
            array
                (
                'field' => 'pes_naturalidade',
                'label' => 'Naturalidade',
                'rules' => 'required|xss_clean'
            ),
            array
                (
                'field' => 'pes_cpf',
                'label' => 'CPF',
                'rules' => 'required|xss_clean'
            ),
            array
                (
                'field' => 'pes_rg',
                'label' => 'RG',
                'rules' => 'required|xss_clean'
            ),
            array
                (
                'field' => 'pes_rgorgaoexpedidor',
                'label' => 'Orgão Expedidor',
                'rules' => 'required|xss_clean'
            ),
            array
                (
                'field' => 'pes_rgdataexpedicao',
                'label' => 'RG - Data Expedição',
                'rules' => 'required|xss_clean'
            ),
            array
                (
                'field' => 'pes_estadocivil',
                'label' => 'Estado Civil',
                'rules' => 'required|xss_clean'
            ),
            array
                (
                'field' => 'pes_formacaoescolar',
                'label' => 'Formação Escolar',
                'rules' => 'required|xss_clean'
            ),
            array
                (
                'field' => 'pes_sexo',
                'label' => 'Sexo',
                'rules' => 'required|xss_clean'
            ),
            array
                (
                'field' => 'pes_datanascimento',
                'label' => 'Data de Nascimento',
                'rules' => 'required|xss_clean'
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
      @ CADASTRAR
      ----------------------------------------------- */

    public function cadastrar() {

        // # scripts e estilos
        /* JGROWL */
        $this->addStyle('statics/admin/css/plugins/jquery.jgrowl.css');
        $this->addScript('statics/admin/js/plugins/jGrowl/jquery.jgrowl.js');
        /* INPUT MASKED */
        $this->addScript('statics/admin/js/plugins/inputmask/bootstrap-inputmask.js');
        /* FILEUPLOAD */
        $this->addScript('statics/admin/js/plugins/fileupload/bootstrap-fileupload.js');


        /* Enviando dados para popular os select  */
        # departamentos
        $dadosDepartamento = $this->m_pessoa->listarTodosDepartamentos();
        $this->data['select_departamento'] = $this->montarDropdown($dadosDepartamento, 'Selecione um Departamento', 'dep_id', 'dep_nome');
        # estado civil
        $dadosEstadoCivil = $this->m_pessoa->listarTodosEstadoCivil();
        $this->data['select_estadocivil'] = $this->montarDropdown($dadosEstadoCivil, 'Selecione um Estado Civil', 'est_id', 'est_titulo');
        #formacaoescolar
        $dadosFormacaoEscolar = $this->m_pessoa->listarTodosFormacaoEscolar();
        $this->data['select_formacaoescolar'] = $this->montarDropdown($dadosFormacaoEscolar, 'Selecione uma Opção', 'for_id', 'for_titulo');


        // # load swf_viewport(xmin, xmax, ymin, ymax)
        $this->loadtemplate('vCadastrarPessoa');
    }

    /* -----------------------------------------------	
      @ GRAVAR
      ----------------------------------------------- */

    public function gravar() {

        // # validando o formulario 
        $this->form_validation->set_rules($this->regras_validacao_formulario);
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('erroValidacaoFormulario', validation_errors());
            redirect(base_url() . 'pessoa/cPessoa/cadastrar');
        } else {
            /* Se o usuário selecionar imagem para upload */
            if (strlen($_FILES['userfile']['name']) > 0) {
                $thumb = $this->uploadfoto->processa('pessoa', 'pessoa/cPessoa/cadastrar/', '400', '400', '', TRUE);
                $dados = array(
                    'dep_id' => $this->input->post('dep_id'),
                    'pes_nome' => $this->input->post('pes_nome'),
                    'pes_apelido' => $this->input->post('pes_apelido'),
                    'pes_nacionalidade' => $this->input->post('pes_nacionalidade'),
                    'pes_naturalidade' => $this->input->post('pes_naturalidade'),
                    'pes_cpf' => $this->input->post('pes_cpf'),
                    'pes_rg' => $this->input->post('pes_rg'),
                    'pes_rgorgaoexpedidor' => $this->input->post('pes_rgorgaoexpedidor'),
                    'pes_rgdataexpedicao' => $this->input->post('pes_rgdataexpedicao'),
                    'pes_estadocivil' => $this->input->post('pes_estadocivil'),
                    'pes_formacaoescolar' => $this->input->post('pes_formacaoescolar'),
                    'pes_sexo' => $this->input->post('pes_sexo'),
                    'pes_datanascimento' => $this->input->post('pes_datanascimento'),
                    'pes_foto' => $thumb,
                    'pes_criado' => date("Y-m-d H:i:s"),
                );
                $query = $this->m_pessoa->gravar($dados);
                if ($query)
                    $this->session->set_flashdata('registroInseridoComSucesso', 'Pessoa inserida com sucesso!');
                redirect(base_url() . 'pessoa/cPessoa/cadastrar/', 'refresh');
            }
            else {
                $dados = array(
                    'dep_id' => $this->input->post('dep_id'),
                    'pes_nome' => $this->input->post('pes_nome'),
                    'pes_apelido' => $this->input->post('pes_apelido'),
                    'pes_nacionalidade' => $this->input->post('pes_nacionalidade'),
                    'pes_naturalidade' => $this->input->post('pes_naturalidade'),
                    'pes_cpf' => $this->input->post('pes_cpf'),
                    'pes_rg' => $this->input->post('pes_rg'),
                    'pes_rgorgaoexpedidor' => $this->input->post('pes_rgorgaoexpedidor'),
                    'pes_rgdataexpedicao' => $this->input->post('pes_rgdataexpedicao'),
                    'pes_estadocivil' => $this->input->post('pes_estadocivil'),
                    'pes_formacaoescolar' => $this->input->post('pes_formacaoescolar'),
                    'pes_sexo' => $this->input->post('pes_sexo'),
                    'pes_datanascimento' => $this->input->post('pes_datanascimento'),
                    'pes_criado' => date("Y-m-d H:i:s"),
                );
                $query = $this->m_pessoa->gravar($dados);
                if ($query)
                    $this->session->set_flashdata('registroInseridoComSucesso', 'Pessoa inserida com sucesso!');
                redirect(base_url() . 'pessoa/cPessoa/cadastrar/', 'refresh');
            }
        }
    }

    /* END GRAVAR */



    /* -----------------------------------------------	
      @ LISTAR PESSOAS
      ----------------------------------------------- */

    public function listarPessoas() {

        // # scripts e estilos
        /* JGROWL */
        $this->addStyle('statics/admin/css/plugins/jquery.jgrowl.css');
        $this->addScript('statics/admin/js/plugins/jGrowl/jquery.jgrowl.js');
        /* DATABLE */
        $this->addScript('statics/admin/js/plugins/dataTables/jquery.datatables.min.js');
        $this->addScript('statics/admin/js/triggers/datatables.js');
        /* LIGHTBOX */
        $this->addStyle('statics/admin/css/plugins/lightbox.css');
        $this->addScript('statics/admin/js/plugins/lightbox/lightbox.js');


        /* Enviando todos os registros para a View */
        $this->data['retrieve'] = $this->m_pessoa->listarPessoas();

        // # load view
        $this->loadtemplate('vListarPessoas');
    }

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



