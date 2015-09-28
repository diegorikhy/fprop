<?php

/**
 * CodeIgniter CRUD Model 2
 *
 * @package CodeIgniter
 * @author    Diego Henrique
 * @copyright Copyright (c) 2013, Diego Henrique
 * @link    http://gustavobotega.com
 *
 */
class M_Crud extends CI_Model {

  /**
   * @ FUNÇÕES - GET ( RETRIEVE )
   */
  public function get_all($table){
    return $this->db->get($table)->result();
  }

  public function get_allLimit($table, $limit){
    return $this->db->get($table, $limit);
  }

  public function get_allLimitOrderby($table, $limit, $orderbyField, $orderbyType){
    $this->db->order_by($orderbyField, $orderbyType);
    return $this->db->get($table, $limit);
  }

  public function get_allOrderby($table, $orderbyField, $orderbyType){
    $this->db->order_by($orderbyField, $orderbyType);
    return $this->db->get($table)->result();
  }

  public function get_allWhere($table, $referenceValue, $entryValue){
    return $this->db->get_where($table, array($referenceValue=>$entryValue))->result();
  }

  public function get_allWhereTwoParameters($table, $referenceValue, $entryValue, $referenceValueSecond, $entryValueSecond){
    $this->db->where($referenceValue, $entryValue);
    $this->db->where($referenceValueSecond, $entryValueSecond);
    $query = $this->db->get($table)->result();
    return $query;
  }

  public function get_allWhereTwoParametersOrderby($table, $referenceValue, $entryValue, $referenceValueSecond, $entryValueSecond, $orderbyField, $orderbyType){
    $this->db->where($referenceValue, $entryValue);
    $this->db->where($referenceValueSecond, $entryValueSecond);
    $this->db->order_by($orderbyField, $orderbyType);
    $query = $this->db->get($table)->result();
    return $query;
  }

  public function get_allWhereTwoParametersOrderbyLimit($table, $referenceValue, $entryValue, $referenceValueSecond, $entryValueSecond, $orderbyField, $orderbyType, $limit){
    $this->db->where($referenceValue, $entryValue);
    $this->db->where($referenceValueSecond, $entryValueSecond);
    $this->db->order_by($orderbyField, $orderbyType);
    $this->db->limit($limit);
    $query = $this->db->get($table)->result();
    return $query;
  }

  public function get_allOrderbyTwoColumns($table, $orderbyField, $orderbyType, $orderbyFieldSecondary, $orderbyTypeFieldSecondary){
    $this->db->order_by($orderbyField, $orderbyType);
    $this->db->order_by($orderbyFieldSecondary, $orderbyTypeFieldSecondary);
    return $this->db->get($table)->result();
  }

  public function get_allWhereThreeParametersOrderby($table, $referenceValue, $entryValue, $referenceValueSecond, $entryValueSecond, $referenceValueThird, $entryValueThird, $orderbyField, $orderbyType){
    $this->db->where($referenceValue, $entryValue);
    $this->db->where($referenceValueSecond, $entryValueSecond);
    $this->db->where($referenceValueThird, $entryValueThird);
    $this->db->order_by($orderbyField, $orderbyType);
    $query = $this->db->get($table)->result();
    return $query;
  }

  public function get_allWhereLimit($table, $referenceValue, $entryValue, $limit){
    return $this->db->get_where($table, array($referenceValue=>$entryValue), $limit);
  }

  public function get_allWhereOrderby($table, $referenceValue, $entryValue, $orderbyField, $orderbyType){
    $this->db->order_by($orderbyField, $orderbyType);
    return $this->db->get_where($table, array($referenceValue=>$entryValue));
  }

  public function get_allWhereLimitOrderby($table, $referenceValue, $entryValue, $limit, $orderbyField, $orderbyType){
    $this->db->order_by($orderbyField, $orderbyType);
    return $this->db->get_where($table, array($referenceValue=>$entryValue), $limit)->result();
  }

  public function get_rowSpecific($table, $referenceValue, $entryValue, $limit, $tablefield)
  {
    $query = $this->db->get_where($table, array($referenceValue=>$entryValue), $limit);
    $query_rows = $query->row();
    return $query_rows->$tablefield;
  }

  public function get_rowSpecificTwoParameters($table, $referenceValue, $entryValue, $referenceValueSecond, $entryValueSecond, $limit, $tablefield)
  {
    $this->db->where($referenceValue, $entryValue);
    $this->db->where($referenceValueSecond, $entryValueSecond);
    $this->db->limit(1);
    $query = $this->db->get($table);
    $query_rows = $query->row();
    return $query_rows->$tablefield;
    //return $query;
  }

  public function get_rowSpecificOrderby($table, $referenceValue, $entryValue, $limit, $tablefield, $orderbyField, $orderbyType)
  {

    $this->db->order_by($orderbyField, $orderbyType);
    $this->db->where($referenceValue, $entryValue);
    $query = $this->db->get($table);
    $query_rows = $query->row();
    return $query_rows->$tablefield;
  }

  public function get_lastRegister($table, $orderbyField, $orderbyType, $tablefield)
  {

    $this->db->order_by($orderbyField, $orderbyType);
    $this->db->limit(1);
    $query = $this->db->get($table);
    $query_rows = $query->row();
    return $query_rows->$tablefield;
  }


  public function get_allOrderbyFourColumns($table, $orderbyField, $orderbyType, $orderbyFieldSecondary, $orderbyTypeFieldSecondary, $orderbyFieldThird, $orderbyTypeFieldThird, $orderbyFieldFourth, $orderbyTypeFieldFourth){
    $this->db->order_by($orderbyField, $orderbyType);
    $this->db->order_by($orderbyFieldSecondary, $orderbyTypeFieldSecondary);
    $this->db->order_by($orderbyFieldThird, $orderbyTypeFieldThird);
    $this->db->order_by($orderbyFieldFourth, $orderbyTypeFieldFourth);
    return $this->db->get($table)->result();
  }







  /**
   * @ FUNÇÕES - INSERT ( INSERT )
   */
  public function insert($table, $data){
    $this->db->insert($table, $data);
    $this->session->set_flashdata('registroInseridoComSucesso','Registro inserido com sucesso!');
  }








  /**
   * @ FUNÇÕES - COUNT
   */
  public function count_tableWhere($table, $referenceValue, $entryValue){
    $this->db->from($table);
    $this->db->where($referenceValue, $entryValue);
    return $this->db->count_all_results();
  }
  public function count_tableWhereTwoParameters($table, $referenceValue, $entryValue, $referenceValueSecond, $entryValueSecond){
    $this->db->from($table);
    $this->db->where($referenceValue, $entryValue);
    $this->db->where($referenceValueSecond, $entryValueSecond);
    return $this->db->count_all_results();
  }














  /**
   * @ FUNÇÕES - UPDATE ( UPDATE )
   */
  public function update($table, $referenceValue, $entryValue, $data){
    $this->db->where($referenceValue, $entryValue);
    $this->db->update($table, $data);
    $this->session->set_flashdata('registroEditadoComSucesso','Item editado com sucesso!');
  }

  /**
   * @ FUNÇÕES - WHERE ( UPDATE )
   */
  public function where($referenceValue, $entryValue){
    return $this->db->where($referenceValue, $entryValue);
  }







  /**
   * @ FUNÇÕES - DELETE ( DELETE )
   */
  public function delete($table, $referenceValue, $entryValue){
    $this->db->delete($table, array($referenceValue => $entryValue));
    $this->session->set_flashdata('registroDeletadoComSucesso','Item deletado com sucesso!');
  }


  /**
   * @ FUNÇÕES - DELETE ( DELETE )
   */
  public function delete_dataAndFile($table, $referenceValue, $entryValue, $tablefield, $directory){
    $idFile = $this->db->get_where($table, array($referenceValue=>$entryValue), 1);
    $row = $idFile->row();
    $nameFile = $row->$tablefield;

    $query = $this->db->delete($table, array($referenceValue => $entryValue));
    if($query):
      unlink( './uploads/' . $directory . '/' . $nameFile);
      $this->session->set_flashdata('registroDeletadoComSucesso','Arquivo deletado com sucesso!');
    endif;
  }

  public function delete_file($table, $referenceValue, $entryValue, $directory, $columnName){
    $query = $this->db->get_where($table, array($referenceValue=>$entryValue));
    $row = $query->row();
    $fileCurrent = $row->$columnName;
    //var_dump($fileCurrent);
    unlink("./uploads/" . $directory . "/" .$fileCurrent);
  }






}

?>
