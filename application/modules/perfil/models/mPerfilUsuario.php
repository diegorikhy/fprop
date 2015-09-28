<?php

class Mperfilusuario extends CI_Model {

	/* @ RETRIEVE */
	function listar()
	{
		$this->db->order_by('pes_id', 'random');
		return $this->db->get('tb_pessoa')->result();
	}


	/* @ RETRIEVE */
	function dadosPessoa($idPessoa)
	{
		return $this->db->get_where('tb_pessoa', array('pes_id'=>$idPessoa))->result();
	}

	/* @ 
	PESSOA - TELEFONE
	 */
	function dadosPessoa_telefone($idPessoa)
	{
		return $this->db->get_where('tb_pessoa_telefone', array('pes_id'=>$idPessoa))->result();
	}

	/* @ 
	PESSOA - ENDEREÇO
	 */
	function dadosPessoa_endereco($idPessoa)
	{
		return $this->db->get_where('tb_pessoa_endereco', array('pes_id'=>$idPessoa))->result();
	}

	/* @ 
	PESSOA - EMAIL
	 */
	function dadosPessoa_email($idPessoa)
	{
		return $this->db->get_where('tb_pessoa_email', array('pes_id'=>$idPessoa))->result();
	}

}

?>