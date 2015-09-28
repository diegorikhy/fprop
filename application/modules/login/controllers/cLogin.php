<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cLogin extends CI_Controller {

    /**
     * Variavel que contem as regras de validacao do formulario 
     * @var array
     */
    function __construct() {
        parent::__construct();

        // # --
        // # carregar models
        // # --
        $this->load->model('m_login', 'm_login');

        // # -- 
        // # definicao das regras de validacao do formulario de cadastro login
        // # -- 
        $this->regras_validacao_formulario = array
            (
            array
                (
                'field' => 'usu_usuario',
                'label' => 'Usuário',
                'rules' => 'required|xss_clean|max_length[30]'
            ),
            array
                (
                'field' => 'usu_senha',
                'label' => 'Senha',
                'rules' => 'xss_clean|max_length[30]|required'
            )
        );
    }

    /* -----------------------------------------------	
      @ MÉTODO INDEX
      - Responsavel por exibir a tela de login;
      ----------------------------------------------- */

    public function index() {
        $this->login();
    }

    public function login() {

        /* Se o usuário já estiver logado no sistema é direcionado para a página 
          principal do sistema ao invés de carregar o Login */
        if ($this->session->userdata('autenticado') == TRUE) {
            redirect('configuracoesgerais/cConfiguracoesgerais/editar', 'refresh');
        }

        // # load view
        $this->load->view('vLogin');
    }

    /* -----------------------------------------------	
      @ PROCESSALOGIN
      - É capturado os dados de login e senha informados pelo usuário no método index().
      - Em seguida é verificado junto ao banco se existe esse usuario com a senha fornecido.
      - Caso haja o usuário é direcionado para área privada, se não, é o usuário é enviado para o método index() responsável por exibir o formulário.
      ----------------------------------------------- */

    public function auth() {

        // # validando o formulario 
        $this->form_validation->set_rules($this->regras_validacao_formulario);
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('erroLogin', 'Preencha corretamente os campos de usuário e senha!');
            redirect(base_url() . 'login/cLogin/login', 'refresh');
        } else {
            // # dados do formulario 
            $usuario = trim($this->input->post('usu_usuario', TRUE));
            $senha = trim($this->input->post('usu_senha', TRUE));
            $senha_criptografada = trim(md5($senha . "t7nr"));

            /* Se a varíavel $usuarioExiste retornar array significa que exis.te */
            $usuarioExiste = $this->m_login->verificaUsuario($usuario, $senha_criptografada, 't7nr');
            if (is_array($usuarioExiste)) {
                /* USUARIO EXISTE - SALVA NA SESSÃO E DIRECIONA PRA A PAGINA PRINCIPAL DO SISTEMA */
                $this->session->set_userdata($usuarioExiste);
                redirect(base_url() . 'configuracoesgerais/cConfiguracoesgerais/editar', 'refresh');
            } else {
                /* USUARIO NÃO EXISTE - DIRECIONA PRA A PAGINA DE LOGIN */
                $this->session->set_flashdata('erroLogin', 'Usuário não encontrado. Tente novamente!');
                redirect(base_url() . 'login/cLogin/login', 'refresh');
            }
        }
    }

    /* END AUTH() */

    function logout() {

        // # resgatando os valores que sao gravados na sessao do usuario quando autenticado.
        $idUsuario = $this->session->userdata('idUsaurio');
        $autenticado = $this->session->userdata('autenticado');
        $token = $this->session->userdata('token');

        if ($autenticado == TRUE && $token == 't7nr') {
            // # destruindo sessao do code Igniter 
            $this->session->sess_destroy();
        }

        // # depois da sessao destruida, verifica se ainda contem alguma falha. O usuario seve ser redirecionado pra a tela de login .
        is_auth();
    }

}

/* END CLASS */

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */



