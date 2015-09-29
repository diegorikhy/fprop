<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Classe base do sistema.
 *
 * @author Rafael Barreto
 *
 */
class MY_Main extends CI_Controller {

    /**
     * Array de dados utitlizado nas views
     * @var Array
     */
    protected $data = array();

    function __construct() {
        // # --
        // # CI
        // # --
      parent::__construct();



        // # --
        // # verifica se o usuario esta logado no sistema
        // # --
      is_auth();


        // # --
        // # Início
        // # --
        /*    $this->load->library('extranet');
          $this->load->model('m_extranet');
         */

        // # --
        // # seta a variavel que contem o menu
        // # --
          $this->data['usuario'] = $this->session->userdata('usuario');
          $this->data['departamento'] = $this->session->userdata('departamento');
          $this->data['permissao'] = $this->session->userdata('permissao');
          $this->data['current_module'] = '';
          $this->data['current_page'] = '';

        // # --
        // # Adicionando os estilos principais para o funcionamento do template
        // # --
          $this->addStyle('statics/admin/css/plugins/jquery.visualize.css');
          $this->addStyle('statics/admin/css/plugins/jquery.fullcalendar.css');
          $this->addStyle('statics/admin/css/plugins/jquery.jgrowl.css');
          $this->addStyle('statics/admin/css/chromatron-green.css');

        // # Adicionando os estilos principais para o funcionamento do template
          $this->addScript('statics/admin/js/navigation.js');
          $this->addScript('statics/admin/js/bootstrap/bootstrap.min.js');
        }

    /**
     * Mostra a estrutura do template
     * @param string $pathView
     */
    protected function loadTemplate($pathView = 'template/content') {
      $this->load->view('template/header', $this->data);
      $this->load->view('template/sidebar');
      $this->load->view($pathView);
      $this->load->view('template/footer');
    }

    /**
     * Funcao que adiciona um arquivo de folha de estilo no sistema. A funcao obedece a uma prioridade de fila.
     * O primeiro arquivo adicionado, sera o primeiro arquivo impresso.
     *
     * O arquivo so e adicionado a fila de estilos caso o $path, ou seja, o caminho do arquivo, seja correto.
     *
     * [$path]  Caminho relativo para o arquivo
     * [$comment] Parametro opcional que descreve o conteudo da folha de estilo
     *
     * @param string $path
     * @param string $comment
     */
    protected function addStyle($path, $comment = '') {
      if (!empty($path)) {
        $this->data['estilos'][] = array('path' => $path, 'comment' => $comment);
      }
    }

    /**
     * Funcao que adiciona um arquivo de script no sistema. A funcao obedece a uma prioridade de fila.
     * O primeiro arquivo adicionado, sera o primeiro arquivo impresso.
     *
     * O arquivo so e adicionado a fila de estilos caso o $path, ou seja, o caminho do arquivo, seja correto.
     *
     * [$path]  Caminho relativo para o arquivo
     *
     * @param string $path
     */
    protected function addScript($path) {
      if (!empty($path)) {
        $this->data['scripts'][] = array('path' => $path);
      }
    }

    /**
     * Retorna um array contendo os estilos utilizados no sistema
     *
     * @return array
     */
    protected function getArrStyles() {
      return $this->data['estilos'];
    }

    /**
     * Retorna um array contendo os scripts utilizados no sistema
     *
     * @return array
     */
    protected function getArrScripts() {
      return $this->data['scripts'];
    }

  /* ----------------------------------------------
   * CRUD
   * TYPE: INSERT
   * FEATURED: ANY
   * ---------------------------------------------- */
  public function crud_addData(array $validation, array $insert, array $settings) {

    foreach ($validation as $validation_key => $validation_value) {
      $this->form_validation->set_rules($validation_value[0], strtoupper($validation_value[1]), $validation_value[2]);
    }

    if ($this->form_validation->run() == TRUE) {

      $newArr = array();
      foreach ($insert as $teste) {
        $newArr[$teste[0]] = $teste[1];
      }

      $newArr['criado'] = date("Y-m-d H:i:s");

      $this->m_crud->insert($settings['tabela'], $newArr);
      redirect(base_url() . $settings['retorno_funcao']);
    } else {
      $this->session->set_flashdata('erroValidacaoFormulario', validation_errors());
      $this->loadtemplate($settings['retorno_arquivo'], $this->data);
    }
  }

  /* ----------------------------------------------
   * CRUD
   * TYPE: EDIT
   * FEATURED: ANY
   * ---------------------------------------------- */
  public function crud_editData(array $validation, array $insert, array $settings) {

    foreach ($validation as $validation_key => $validation_value) {
      $this->form_validation->set_rules($validation_value[0], strtoupper($validation_value[1]), $validation_value[2]);
    }


    if ($this->form_validation->run() == TRUE) {

      $newArr = array();
      foreach ($insert as $teste) {
        $newArr[$teste[0]] = $teste[1];
      }
      $newArr['modificado'] = date("Y-m-d H:i:s");

      $this->m_crud->update($settings['tabela'], $settings['referenceValue'], $settings['entryValue'], $newArr);
      redirect(base_url() . $settings['retorno_funcao'] . '/' . $settings['entryValue']);
    } else {
      $this->session->set_flashdata('erroValidacaoFormulario', validation_errors());
      redirect(base_url() . $settings['retorno_funcao'] . '/' . $settings['entryValue']);
    }
  }

  /* ----------------------------------------------
   * CRUD
   * TYPE: INSERT
   * FEATURED: GALLERY
   * ---------------------------------------------- */
  public function crud_addGallery(array $validation, array $insert, array $settings) {

    foreach ($validation as $validation_key => $validation_value) {
      $this->form_validation->set_rules($validation_value[0], strtoupper($validation_value[1]), $validation_value[2]);
    }

    if ($this->form_validation->run() == TRUE) {

      $newArr = array();
      foreach ($insert as $teste) {
        $newArr[$teste[0]] = $teste[1];
      }

      $thumb = $this->uploadfoto($settings['thumb_diretorio'], $settings['thumb_retorno'], $settings['thumb_width'], $settings['thumb_height'], $settings['thumb_id'], $settings['thumb_ratio'], $settings['thumb_crop']);

      $newArr[$settings['thumb_campo']] = $thumb;
      $newArr['criado'] = date("Y-m-d H:i:s");

      $this->m_crud->insert($settings['tabela'], $newArr);
      redirect(base_url() . $settings['retorno_funcao']);
    } else {
      $this->session->set_flashdata('erroValidacaoFormulario', validation_errors());

      $this->data['titleSection'] = $settings['titleSection'];
      $this->data['subtitleSection'] = $settings['subtitleSection'];
      redirect(base_url() . $settings['retorno_funcao']);
    }
  }

  /* ----------------------------------------------
   * CRUD
   * TYPE: EDIT
   * FEATURED: GALLERY
   * ---------------------------------------------- */
  public function crud_editGallery(array $validation, array $insert, array $settings) {


    /* VALIDAÇÃO DAS REGRAS DO FORMULÁRIO */
    foreach ($validation as $validation_key => $validation_value) {
      $this->form_validation->set_rules($validation_value[0], strtoupper($validation_value[1]), $validation_value[2]);
    }


    if ($this->form_validation->run() == TRUE) {

            // SE O USUÁRIO SELECIONAR A IMAGEM PARA UPLOAD
      if (strlen($_FILES['userfile']['name']) > 0) {

        /* CAPTURANDO VALOR DOS CAMPOS */
        $newArr = array();
        foreach ($insert as $teste) {
          $newArr[$teste[0]] = $teste[1];
        }
        $newArr['modificado'] = date("Y-m-d H:i:s");

        /* DELETANDO FOTO ATUAL DO SERVIDOR */
        $this->m_crud->delete_file($settings['tabela'], $settings['referenceValue'], $settings['entryValue'], $settings['thumb_diretorio'], $settings['thumb_campo']);

        /* ENVIO DE IMAGEM */
        $thumb = $this->uploadfoto($settings['thumb_diretorio'], $settings['thumb_retorno'], $settings['thumb_width'], $settings['thumb_height'], $settings['thumb_id'], $settings['thumb_ratio'], $settings['thumb_crop']);
        $newArr[$settings['thumb_campo']] = $thumb;

        $this->m_crud->update($settings['tabela'], $settings['referenceValue'], $settings['entryValue'], $newArr);
        redirect(base_url() . $settings['retorno_funcao'] . '/' . $settings['entryValue']);
      }
          // SE O USUÁRIO NÃO SELECIONAR A IMAGEM PARA UPLOAD
      else {
        $newArr = array();
        foreach ($insert as $teste) {
          $newArr[$teste[0]] = $teste[1];
        }
        $newArr['modificado'] = date("Y-m-d H:i:s");
        $this->m_crud->update($settings['tabela'], $settings['referenceValue'], $settings['entryValue'], $newArr);
        redirect(base_url() . $settings['retorno_funcao'] . '/' . $settings['entryValue']);
      }
    }
        // FIM DE VALIDAÇÃO DO FORMULÁRIO
    else {
      $this->session->set_flashdata('validation_errors', validation_errors());
      redirect(base_url() . $settings['retorno_funcao'] . '/' . $settings['entryValue']);
    }
  }

  /*
   * UPLOADFOTO
   * ( FUNÇÃO PARA ENVIAR FOTO )
   */
  public function uploadfoto($diretorio, $retorno, $width, $height, $id, $ratio, $crop) {

    $config['upload_path'] = './uploads/' . $diretorio;
    $config['allowed_types'] = 'gif|jpg|jpeg|png|tiff|GIF|JPG|JPEG|PNG';
    $config['max_size'] = '10000';
    $config['max_width'] = '7000';
    $config['max_height'] = '7000';
    $config['overwrite'] = FALSE;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload()) {
      $error = array('error' => $this->upload->display_errors());
      $this->session->set_flashdata('erroUploadImagem', $error['error']);
      redirect(base_url() . $retorno . '/' . $id, 'refresh');
    } else {

      $data = array('upload_data' => $this->upload->data());

      $config['image_library'] = 'gd2';
      $config['source_image'] = './uploads/' . $diretorio . "/" . $data['upload_data']['file_name'];
      $config['create_thumb'] = FALSE;
      $config['maintain_ratio'] = $ratio;
      $config['width'] = $width;
      $config['height'] = $height;

      if ($crop) {
        $dim = (intval($data['upload_data']["image_width"]) / intval($data['upload_data']["image_height"])) - ($config['width'] / $config['height']);

        // AJUSTAR A MENOR DIMENSAO E CALCULAR PONTO DE CORTE PARA FICAR NO CENTRO
        if ($dim > 0) {
          $x_axis = ($config['height'] * $data['upload_data']["image_width"]) / $data['upload_data']["image_height"];
          $x_axis = (int) (($x_axis - $config['width']) / 2);
          $y_axis = 0;
          $config['master_dim'] = "height";
        } else {
          $y_axis = ($config['width'] * $data['upload_data']["image_height"]) / $data['upload_data']["image_width"];
          $y_axis = (int) (($y_axis - $config['height']) / 2);
          $x_axis = 0;
          $config['master_dim'] = "width";
        }

        $config['x_axis'] = $x_axis;
        $config['y_axis'] = $y_axis;

        // REDIMENCIONANDO REDIMENCIONANDO
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        // CORTANDO IMAGEM
        $config['maintain_ratio'] = FALSE;
        $this->image_lib->initialize($config);
        $this->image_lib->crop();
      } else {
        // REDIMENCIONANDO REDIMENCIONANDO
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
      }

      if ($data['upload_data']['is_image'] == TRUE) {
        return $data['upload_data']['file_name'];
      }
    }
  }

  /*
   * ------------------------------------------------------------
   * MONTAR DROPDOWN
   * - Retorna os dados no formato específico pra montar um combo
   * via codeigniter;
   * ------------------------------------------------------------
   */
  function montarDropdown($dados, $primeiroOption, $indice, $valor) {
    $arrAux = array('' => $primeiroOption);
    foreach ($dados as $key => $value) {
      $arrAux[$value->$indice] = $value->$valor;
    }
    return $arrAux;
  }

}
