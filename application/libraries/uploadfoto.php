<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Uploadfoto {

    private $ci;
    public $config = array();

    function __construct() {
        $this->ci = &get_instance();
        $this->ci->load->library('upload');
        $this->ci->load->library('image_lib');
    }

    /*
      @ USO
     */
    /*
      UPLOADFOTO
      ( FUNÇÃO PARA ENVIAR FOTO )
     */

    public function processa($diretorio, $retorno, $width, $height, $id, $ratio) {

        $this->config['upload_path'] = './uploads/' . $diretorio;
        $this->config['allowed_types'] = 'gif|jpg|jpeg|png|tiff|GIF|JPG|JPEG|PNG';
        $this->config['max_size'] = '10000';
        $this->config['max_width'] = '7000';
        $this->config['max_height'] = '7000';
        $this->config['overwrite'] = FALSE;

        $this->ci->upload->initialize($this->config);

        if (!$this->ci->upload->do_upload()) {
            $error = array('error' => $this->ci->upload->display_errors());
            $erro = $error['error'];
            $this->ci->session->set_flashdata('erro', $erro);
            //var_dump($this->config['upload_path']);
            //var_dump($erro);
            die();
            #redirect(base_url().'gerenciador/' . $retorno . '/' . $id , 'refresh');
        } else {
            $data = array('upload_data' => $this->ci->upload->data());
            $this->config['image_library'] = 'gd2';
            $this->config['source_image'] = './uploads/' . $diretorio . "/" . $data['upload_data']['file_name'];
            $this->config['create_thumb'] = FALSE;
            $this->config['maintain_ratio'] = $ratio;
            $this->config['width'] = $width;
            $this->config['height'] = $height;

            $this->ci->image_lib->initialize($this->config);

            $this->ci->image_lib->resize();

            if ($data['upload_data']['is_image'] == TRUE) {
                return $data['upload_data']['file_name'];
            }
        }
    }

    /*
      PROCESSA ARQUIVO
     */

    public function processaArquivo($diretorio, $retorno, $id) {

        $this->config['upload_path'] = './uploads/' . $diretorio;
        $this->config['allowed_types'] = 'pdf|doc|docx|rar|zip|PDF|DOC|DOCX|RAR|ZIP';
        $this->config['max_size'] = '10000';
        $this->config['overwrite'] = FALSE;

        $this->ci->upload->initialize($this->config);

        if (!$this->ci->upload->do_upload()) {
            $error = array('error' => $this->ci->upload->display_errors());
            $erro = $error['error'];
            $this->ci->session->set_flashdata('erro', $erro);
            //var_dump($erro);
            redirect(base_url() . 'gerenciador/' . $retorno . '/' . $id, 'refresh');
        } else {
            $data = array('upload_data' => $this->ci->upload->data());
            if ($data['upload_data'] == TRUE) {
                return $data['upload_data']['file_name'];
            }
        }
    }

}

/* END CLASS */
?>