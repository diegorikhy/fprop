<?php

class m_departamento extends CI_Model {

	/*-----------------------------------------------	
	@ RETRIEVE
	-----------------------------------------------*/
	function retrieve()
	{
		return $this->db->get('tb_departamento')->result();
	}

	/*-----------------------------------------------	
	@ GRAVAR
	-----------------------------------------------*/
	function gravar($dados)
	{
		return $this->db->insert('tb_departamento', $dados);
	}

	/*-----------------------------------------------	
	@ EDITAR
	-----------------------------------------------*/
	function editar($idDepartamento, $dados)
	{
		$this->db->where('dep_id', $idDepartamento);
		return $this->db->update('tb_departamento', $dados); 
	}

	/*-----------------------------------------------	
	@ DELETAR
	-----------------------------------------------*/
	function deletar($idDepartamento){

		/* Verificando se não há nenhuma ligação do departamento com a pessoa */
		$this->db->from('tb_pessoa');
		$this->db->where('dep_id', $idDepartamento);
		$count 	= $this->db->count_all_results();
		if($count > 0)
		{
			return false;
		}
		else
		{
			$query = $this->db->get_where('tb_departamento', array('dep_id'=>$idDepartamento));
			$row = $query->row();
			$fileCurrent = $row->dep_thumborganograma;
			unlink("./uploads/departamento/" . $fileCurrent);
			return $this->db->delete('tb_departamento', array('dep_id' => $idDepartamento));
		}
	}

	/* COUNT - PESSOAS NO DEPARTAMENTO */
	function contarPessoasNoDepartamento($idDepartamento)
	{
		$this->db->from('tb_pessoa');
		$this->db->where('dep_id', $idDepartamento);
		return $this->db->count_all_results();
	}

	/* Retorna o nome do departamento a partir do ID passado como parâmetro */
	function nomeDepartamento($idDepartamento)
	{
		$query = $this->db->get_where('tb_departamento', array('dep_id'=>$idDepartamento), 1);
		$query_rows = $query->row();
		return $query_rows->dep_nome;
	}

	/*  */
	function dados($idDepartamento)
	{
		return $this->db->get_where('tb_departamento', array('dep_id'=>$idDepartamento))->result();
	}

	function deletefile($table, $referenceValue, $entryValue, $directory, $columnName){
		$query = $this->db->get_where($table, array($referenceValue=>$entryValue));
		$row = $query->row();
		$fileCurrent = $row->$columnName;
		unlink("./uploads/" . $directory . "/" . $fileCurrent);
	}


}

?>