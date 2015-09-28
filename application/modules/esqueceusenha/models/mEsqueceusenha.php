<?php

class mEsqueceusenha extends CI_Model {
    /* @ ALTERARSENHA */

    function alterarSenha($email, $cpf, $senha) {

        $usuario = $this->db->get_where('tb_usuario', array('usu_usuario' => $email))->result();
        $pessoa = $this->db->get_where('tb_pessoa', array('pes_cpf' => $cpf))->result();


        if (!empty($usuario[0]) && !empty($pessoa[0])) {
            if ($usuario[0]->pes_id == $pessoa[0]->pes_id) {
                $data = array(
                    'usu_senha' => $senha
                );

                $this->db->where('usu_usuario', $email);
                $this->db->update('tb_usuario', $data);
                return true;
            }
            return false;
        } else {
            return false;
        }
    }

}

?>