<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class cEsqueceusenha extends CI_Controller
{

	/**
	 * Variavel que contem as regras de validacao do formulario 
	 * @var array
	 */

	function __construct()
	{
		parent::__construct();

		$this->data['current_module']		=	'';

		// # --
		// # carregar models
		// # --
        $this->load->model('mEsqueceusenha', 'mEsqueceusenha');
	}


	/*-----------------------------------------------	
	@ MÉTODO INDEX
	-----------------------------------------------*/
	public function index()
	{
		$this->exibirFormulario();
	}

	/*-----------------------------------------------	
	@ MÉTODO INDEX
	-----------------------------------------------*/
	public function exibirFormulario()
	{
		$this->load->view('vEsqueceusenha');
	}

	public function processa()
	{
		$email = $this->input->post('email');
		$cpf = $this->input->post('cpf');
		$novaSenha = $this->geraSenha();
		
		$retorno = $this->mEsqueceusenha->alterarSenha($email, $cpf, md5($novaSenha));
		if ($retorno) {
			$this->session->set_flashdata('senhaalterada', 'Sua nova senha temporária foi enviada por e-mail!');
		} else {
			$this->session->set_flashdata('senhanaoalterada', 'Falha na alteração da senha. E-mail ou CPF são incompatíveis!');
		}
		redirect(base_url().'esqueceusenha/cEsqueceusenha', 'refresh');
		
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
	function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
	{
		$lmin = 'abcdefghijklmnopqrstuvwxyz';
		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num = '1234567890';
		$simb = '!@#$%*-';
		$retorno = '';
		$caracteres = '';

		$caracteres .= $lmin;
		if ($maiusculas) $caracteres .= $lmai;
		if ($numeros) $caracteres .= $num;
		if ($simbolos) $caracteres .= $simb;

		$len = strlen($caracteres);
		for ($n = 1; $n <= $tamanho; $n++)
		{
			$rand = mt_rand(1, $len);
			$retorno .= $caracteres[$rand-1];
		}
		return $retorno;
	}


}
/* END CLASS */

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */



