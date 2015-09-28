<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class cDepartamento extends MY_Main {

	/**
	 * Variavel que contem as regras de validacao do formulario 
	 * @var array
	 */

	function __construct()
	{
		parent::__construct();

		// # --
		// # carregar models
		// # --
        $this->load->model('m_departamento', 'm_departamento');
		

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
             'field'   => 'dep_nome', 
             'label'   => 'Nome do Departamento', 
             'rules'   => 'required|xss_clean'
           ),

		);

	}
	

	/*-----------------------------------------------	
	@ MÉTODO INDEX
	-----------------------------------------------*/
	public function index()
	{


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
		

		/* Enviando todos os registros para a View */
		$this->data['retrieve']		=	$this->m_departamento->retrieve();

		// # load view
		$this->loadtemplate( 'vDepartamento' );

	}


	/*-----------------------------------------------	
	@ GRAVAR
	-----------------------------------------------*/
	public function gravar()
	{

		// # validando o formulario 
		$this->form_validation->set_rules( $this->regras_validacao_formulario ); 
		if( $this->form_validation->run() == FALSE )
		{ 
			$this->session->set_flashdata('erroValidacaoFormulario', validation_errors());
			redirect(base_url() . 'departamento/cDepartamento/index', 'refresh');
		}
		else
		{

			#	public function processa($diretorio, $retorno, $width, $height, $id, $ratio){

			$thumb = $this->uploadfoto->processa('departamento', 'departamento/cDepartamento/index/', '750', '750', '', TRUE);
			$dados = array(
				'dep_thumborganograma'		=>		$thumb,
				'dep_nome'					=>		$this->input->post('dep_nome'),
				'dep_criado'				=>		date("Y-m-d H:i:s"),
			);

			$query = $this->m_departamento->gravar($dados);
			if($query)
				$this->session->set_flashdata('registroInseridoComSucesso', 'Departamento adicionado com sucesso!');
				redirect(base_url() . 'departamento/cDepartamento/index', 'refresh');
		}

	}




	/*-----------------------------------------------	
	@ Deletar
	- Deleta o departamento de acordo com o parâmetro passado no metodo deletar();
	-----------------------------------------------*/
	public function deletar($idDepartamento)
	{

		$query = $this->m_departamento->deletar($idDepartamento);
		if($query == TRUE)
		{
			$this->session->set_flashdata('registroDeletadoComSucesso',' Departamento deletado com sucesso');
			redirect(base_url() . 'departamento/cDepartamento/index', 'refresh');
		}
		else
		{
			$pessoasNoDepartamento 	=	$this->m_departamento->contarPessoasNoDepartamento($idDepartamento);
			$nomeDepartamento		=	$this->m_departamento->nomeDepartamento($idDepartamento);
			$this->session->set_flashdata('falhaDelecaoDoRegistro',' O departamento <strong>' . $nomeDepartamento . '</strong> não pode ser deletado. Existe ' . $pessoasNoDepartamento . " pessoa(s) associada(s) a este departamento.");
			redirect(base_url() . 'departamento/cDepartamento/index', 'refresh');
		}

	}



	/*-----------------------------------------------	
	@ MÉTODO EDITAR
	- Responsavel por editar o departamento;
	-----------------------------------------------*/
	public function editar($idDepartamento)
	{

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
		$this->data['retrieve']		=	$this->m_departamento->dados($idDepartamento);

		// # load view
		$this->loadtemplate( 'vEditarDepartamento' );

	}

	/*-----------------------------------------------	
	@ MÉTODO PROCESSA EDITAR
	- Responsavel por processar as alterações;
	-----------------------------------------------*/
	public function processaEditar($idDepartamento)
	{

		// # validando o formulario 
		$this->form_validation->set_rules( $this->regras_validacao_formulario ); 
		if( $this->form_validation->run() == FALSE )
		{ 
			$this->session->set_flashdata('erroValidacaoFormulario', validation_errors());
			redirect(base_url() . 'departamento/cDepartamento/editar/' . $idDepartamento, 'refresh');
		}
		else
		{
			/* Se o usuário selecionar imagem para upload */
			if(strlen($_FILES['userfile']['name'])>0){

				/* Deleta Imagem Atual*/
				$this->m_departamento->deletefile('tb_departamento', 'dep_id', $idDepartamento, 'departamento', 'dep_thumborganograma');

				/* Processa Nova Imagem */
				$thumb = $this->uploadfoto->processa('departamento', 'departamento/cDepartamento/editar/', '750', '750', $idDepartamento, TRUE);


				$dados = array(
					'dep_thumborganograma'		=>		$thumb,
					'dep_nome'					=>		$this->input->post('dep_nome'),
					'dep_ultimamodificacao'		=>		date("Y-m-d H:i:s"),
				);
				$query = $this->m_departamento->editar($idDepartamento, $dados);
				if($query)
					$this->session->set_flashdata('registroEditadoComSucesso', 'Departamento editado com sucesso!');
					redirect(base_url() . 'departamento/cDepartamento/editar/' . $idDepartamento, 'refresh');

			}
			else{
				$dados = array(
					'dep_nome'					=>		$this->input->post('dep_nome'),
					'dep_ultimamodificacao'		=>		date("Y-m-d H:i:s"),
				);
				$query = $this->m_departamento->editar($idDepartamento, $dados);
				if($query)
					$this->session->set_flashdata('registroEditadoComSucesso', 'Departamento editado com sucesso!');
					redirect(base_url() . 'departamento/cDepartamento/editar/' . $idDepartamento, 'refresh');
			}
		}

	}



}
/* END CLASS */

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */



