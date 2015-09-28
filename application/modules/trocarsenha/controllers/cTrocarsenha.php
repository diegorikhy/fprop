<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cTrocarsenha extends MY_Main {

    /**
     * Variavel que contem as regras de validacao do formulario 
     * @var array
     */
    function __construct() {
        parent::__construct();

        $this->data['current_module'] = '';

        // # --
        // # carregar models
        // # --
        $this->load->model('mTrocarsenha', 'mTrocarsenha');
    }

    /* -----------------------------------------------	
      @ MÉTODO INDEX
      ----------------------------------------------- */

    public function index() {

        $this->formulario();
    }

    /* -----------------------------------------------	
      @ MÉTODO FORMULARIO
      ----------------------------------------------- */

    public function formulario() {
        $this->loadtemplate('vTrocarsenha');
    }

    /* -----------------------------------------------	
      @ MÉTODO PROCESSA
      ----------------------------------------------- */

    public function processa() {

        $token = $this->session->userdata('token');
        $usuario = $this->session->userdata('usuario');
        $senhaAtual = $this->input->post('senhaAtual');
        $novaSenha = $this->input->post('novaSenha');
        $confirmeNovaSenha = $this->input->post('confirmeNovaSenha');

        $this->form_validation->set_rules('senhaAtual', 'SENHA ATUAL', 'required');
        $this->form_validation->set_rules('novaSenha', 'NOVA SENHA', 'required|matches[confirmeNovaSenha]');
        $this->form_validation->set_rules('confirmeNovaSenha', 'CONFIRME A NOVA SENHA', 'required');
        if ($this->form_validation->run() == TRUE) {

            $senhaAtualExiste = $this->m_crud->count_tableWhereTwoParameters('tb_usuario', 'usu_usuario', $usuario, 'usu_senha', md5($senhaAtual . $token));


            if ($senhaAtualExiste == 1) {
                $data = array(
                    'usu_senha' => md5($novaSenha . $token)
                );

                $this->db->where('usu_usuario', $usuario);
                $query = $this->db->update('tb_usuario', $data);


                $this->session->set_flashdata('sucessoTrocarSenha', 'Senha alterada com sucesso!');
                redirect(base_url() . 'trocarsenha/cTrocarsenha/formulario', 'refresh');
            } else {
                $this->session->set_flashdata('erroTrocarSenha', 'Não foi possível alterar a senha!');
                redirect(base_url() . 'trocarsenha/cTrocarsenha/formulario', 'refresh');
            }
        } else {
            $this->session->set_flashdata('erroTrocarSenha', 'Preencha o formulário corretamente! <br />' . validation_errors());
            redirect(base_url() . 'trocarsenha/cTrocarsenha/formulario', 'refresh');
        }
    }

    /**
     * Função para gerar senhas aleatórias
     *
     * @author    Thiago Belem <contato@thiagobelem.net>
     *
     * @param integer $tamanho Tamanho da senha a ser gerada
     * @param boolean $maiusculas Se terá letras maiúsculas
     * @param boolean $numeros Se terá números
     * @param boolean $simbolos Se terá símbolos
     *
     * @return string A senha gerada
     */
    function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false) {
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
        $retorno = '';
        $caracteres = '';

        $caracteres .= $lmin;
        if ($maiusculas)
            $caracteres .= $lmai;
        if ($numeros)
            $caracteres .= $num;
        if ($simbolos)
            $caracteres .= $simb;

        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand - 1];
        }
        return $retorno;
    }

}

/* END CLASS */

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */



