<?php

/**
 * CodeIgniter Identificacao Model
 *
 * @package   CodeIgniter
 * @author    Diego Henrique
 * @copyright Copyright (c) 2013, Diego Henrique
 * @link    http://diegovieira.net
 *
 */
class m_Login extends CI_Model {

  public function verificaUsuario($usu_usuario, $usu_senha, $token)
  {

    $this->db->where('usu_usuario', $usu_usuario);
    $this->db->where('usu_senha', $usu_senha);
    $getUsuarios = $this->db->get('tb_usuario');
    if ($getUsuarios->num_rows() == 1) {

      $getUsuarioInfo     =  $getUsuarios->result();
      $getPessoaInfo      =  $this->db->get_where('tb_pessoa', array('pes_id' => $getUsuarioInfo[0]->pes_id ))->result();
      $getDepartamentoInfo            =  $this->db->get_where('tb_departamento', array('dep_id' => $getPessoaInfo[0]->dep_id))->result();


      /* RETORNAR ARRAY COM OS DADOS */
      $arrData = array(
        'idUsuario'      => $getUsuarioInfo[0]->usu_id,
        'usuario'        => $getUsuarioInfo[0]->usu_usuario,
        'autenticado'    => TRUE,
        'token'          => $token,
        'idPessoa'       => $getPessoaInfo[0]->pes_id,
        'nome'           => $getPessoaInfo[0]->pes_nome,
        'apelido'        => $getPessoaInfo[0]->pes_apelido,
        'foto'           => $getPessoaInfo[0]->pes_foto,
        'permissao'      => $getUsuarioInfo[0]->usu_permissao,
        'departamento'   => $getDepartamentoInfo[0]->dep_nome,
        'idDepartamento' => $getDepartamentoInfo[0]->dep_id,
      );
      return $arrData;
    }

    return false;

  }



}

?>
