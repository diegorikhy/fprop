<?php

class mAniversariantes extends CI_Model {

	/*-----------------------------------------------	
	@ RETRIEVE
	-----------------------------------------------*/
	function aniversariantesDoMes()
	{

		/* PEGA TODAS */
		return $this->db->query("select * from tb_pessoa where Month(tb_pessoa.pes_datanascimento) = ".date('m')." ORDER BY pes_datanascimento DESC ")->result();
	}


}

?>